<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\UserDetailsRequest;
use App\Http\Requests\Admin\TransactionRequest;
use App\Http\Managers\UserManager;
use App\Models\Purpose;
use App\Models\HistoryTransaction;

class CreditsController extends Controller
{
    private $userManager;
    private $credits;
    private $title;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
        $this->credits = config('const.purpose.credits');
        $this->title = config('const.title.credits');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userManager->getUsers($this->credits);
        return view('admin.pages.credits.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.credits.form');
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
        $this->userManager->storeCredits($data);
        return redirect()->route('admin.customer.credits')->with('success','Successfully Added the Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $customer)
    {
        return view('admin.pages.credits.form', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $customer)
    {
        $data = $request->all();
        $this->userManager->updateUser($data, $customer);
        return redirect()->route('admin.customer.credits')->with('success','Successfully Updated the Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = $this->userManager->removeUser($request, $this->credits);
        if($delete){
            return redirect()->route('admin.customer.credits')->with('success','Successfully deleted the Data');
        }
        return redirect()->route('admin.customer.credits')->with('error','Something went wrong');
    }


    // History Transaction
    public function creditsHistory()
    {
        $title = $this->title;
        $transactions = $this->userManager->getHistory($this->credits);
        return view('admin.pages.history.index',compact('transactions','title'));
    }

    public function userCreditsHistory(User $user)
    {
        $title = $this->title;
        $transactions = $user->purpose->first()->transactions;
        return view('admin.pages.history.index', compact('transactions','title'));
    }

    // Transactions
    public function creditsTransactionAdd(User $user)
    {
        $title = $this->title;
        $label = "Add ".$title;
        return view('admin.pages.transactions.form',compact('user','label','title'));
    }

    public function creditsTransactionPay(User $user)
    {
        $title = $this->title;
        $label = "Pay ".$title;
        return view('admin.pages.transactions.form',compact('user','label','title'));
    }

    public function storeCreditsTransactions(TransactionRequest $request, User $user)
    {
        $data = $request->all();
        $data['transaction_type'] = $data['label'];
        $balance = $user->purpose->first()->available_balance;
        if($data['amount'] > $balance && $data['label'] != "Add Credits"){
            return redirect()->back()->with('error','You inputed a greater amount than your balance');
        }
        $balance = $data['label'] == "Add Credits" ? $balance + floatval($data['amount']) : $balance - floatval($data['amount']);
        $data['available_balance'] = $balance;
        $user->purpose()->update([
            'amount' => $request->amount,
            'available_balance' => $balance
        ]);
        $user->purpose->first()->transactions()->create($data);
        return redirect()->route('admin.customer.credits')->with('success',$data['label']." Successfully");
    }


    // Apply Credits from Savings Account
    public function applicationForm(User $user)
    {
        $title = $this->title;
        return view('admin.pages.transactions.application',compact('title','user'));
    }

    public function storeApplication(TransactionRequest $request, User $user)
    {
        $data = $request->all();
        $data['type'] = config('const.purpose.credits');
        $data['available_balance'] = $data['amount'];
        $data['transaction_type'] = config('const.transactions.add_debts');
        $this->userManager->savePurpose($user, $data);

        return redirect()->route('admin.customer.credits')->with('success','Successfully added to credits');
    }
}
