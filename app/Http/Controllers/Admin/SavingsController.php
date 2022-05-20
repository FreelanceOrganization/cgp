<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserDetailsRequest;
use App\Http\Requests\Admin\TransactionRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Managers\UserManager;
use App\Models\Purpose;

class SavingsController extends Controller
{

    private $userManager;
    private $savings;
    private $title;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
        $this->savings = config('const.purpose.savings');
        $this->title = config('const.title.savings');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userManager->getUsers($this->savings);
        return view('admin.pages.savings.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.savings.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserDetailsRequest $request)
    {
        $data = $request->all();
        $this->userManager->storeSavings($data);
        return redirect()->route('admin.customer.savings')->with('success','Successfully Added the Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $customer)
    {
       return view('admin.pages.savings.form', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserDetailsRequest $request, User $customer)
    {
        $data = $request->all();
        $this->userManager->updateUser($data, $customer);
        return redirect()->route('admin.customer.savings')->with('success','Successfully Updated the Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = $this->userManager->removeUser($request, $this->savings);
        if($delete){
            return redirect()->route('admin.customer.savings')->with('success','Successfully deleted the Data');
        }
        return redirect()->route('admin.customer.savings')->with('error','Something went wrong');
    }

    // History Transactions
    public function savingsHistory()
    {
        $title = $this->title;
        $transactions = $this->userManager->getHistory($this->savings);
        return view('admin.pages.history.index',compact('transactions','title'));
    }

    public function userSavingsHistory(User $user)
    {
        $title = $this->title;
        $transactions = $user->purpose->first()->transactions;
        return view('admin.pages.history.index', compact('transactions','title'));
    }


    // Transaction
    public function savingsTransactionDeposit(User $user)
    {
        $label = "Deposit";
        $title = $this->title;
        return view('admin.pages.transactions.form',compact('user','label','title'));
    }

    public function savingsTransactionWithdraw(User $user)
    {
        $label = "Withdraw";
        $title = $this->title;
        return view('admin.pages.transactions.form',compact('user','label','title'));
    }

    public function storeSavingsTransactions(TransactionRequest $request, User $user)
    {
        $data = $request->all();
        $data['transaction_type'] = $data['label'];
        $balance = $this->userManager->getBalance($user, $this->savings);
        if($data['amount'] > $balance && $data['label'] != "Deposit"){
            return redirect()->back()->with('error','You inputed a greater amount than your balance');
        }
        $data['available_balance'] = $data['label'] == "Deposit" ? $balance + floatval($data['amount']) : $balance - floatval($data['amount']);
        $this->createTransaction($data, $user, $this->savings);
        return redirect()->route('admin.customer.savings')->with('success',$data['label']." Successfully");
    }

    // Application from Credits to Savings
    public function applicationForm(User $user)
    {
        $title = $this->title;
        return view('admin.pages.transactions.application',compact('title','user'));
    }

    public function storeApplication(TransactionRequest $request, User $user)
    {
        $data = $request->all();
        $data['type'] = $this->savings;
        $data['available_balance'] = $data['amount'];
        $data['transaction_type'] = config('const.transactions.deposit');
        $this->userManager->savePurpose($user, $data);

        return redirect()->route('admin.customer.savings')->with('success','Successfully added to credits');
    }

    // Pay Credits From Savings
    public function transactionFromCredits(User $user)
    {
        return view('admin.pages.transactions.pay_credits_form',compact('user'));
    }

    public function storeTransactionFromCredits(TransactionRequest $request, User $user)
    {
        $data = $request->all();
        $savings = $this->userManager->getBalance($user, $this->savings);
        $credits = $this->userManager->getBalance($user, config('const.purpose.credits'));
        if($data['amount'] > $credits || $data['amount'] > $savings){
            return redirect()->back()->with('error','You inputed a greater amount than your balance');
        }
        $data['available_balance'] =  $credits - floatval($data['amount']);
        $data['transaction_type'] = config('const.transactions.pay_debts_from_savings');
        $this->createTransaction($data, $user, config('const.purpose.credits'));
        $data['available_balance'] =  $savings - floatval($data['amount']);
        $this->createTransaction($data, $user, $this->savings);

        return redirect()->route('admin.customer.credits')->with('success','Successfully pay credits from savings');
    }


    public function createTransaction($data, $user, $type)
    {
        $user->purpose->where('type',$type)->first()->update([
            'amount' => $data['amount'],
            'available_balance' => $data['available_balance']
        ]);
        $user->purpose->where('type',$type)->first()->transactions()->create($data);
    }

}
