<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserDetailsRequest;
use App\Http\Requests\Admin\TransactionRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Managers\UserManager;

class SavingsController extends Controller
{

    private $userManager;
    private $savings;
    private $title;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
        $this->savings = config('const.purpose.savings');
        $this->title = "Savings";
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
        $balance = $user->purpose->first()->available_balance;
        if($data['amount'] > $balance && $data['label'] != "Deposit"){
            return redirect()->back()->with('error','You inputed a greater amount than your balance');
        }
        $balance = $data['label'] == "Deposit" ? $balance + floatval($data['amount']) : $balance - floatval($data['amount']);
        $data['available_balance'] = $balance;
        $user->purpose()->update([
            'amount' => $request->amount,
            'available_balance' => $balance
        ]);
        $user->purpose->first()->transactions()->create($data);
        return redirect()->route('admin.customer.savings')->with('success',$data['label']." Successfully");
    }
}
