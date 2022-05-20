<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\HistoryTransaction;
use App\Http\Requests\Admin\TransactionRequest;

class UserController extends Controller
{
    public function adminConfig()
    {
        return view('admin.pages.account');
    }

    public function changePassword(UserRequest $request)
    {
        $user = Auth::user();
        if($user){
            if(Hash::check($request->current, $user->password)){
                $newPass = Hash::make($request->password);
                $user->update([
                    'password' => $newPass
                ]);
                return redirect()->back()->with('success','Successfully Changed Password');
            }
            return redirect()->back()->with('error','Current password does not match in our record!');
        }
        return redirect()->route('login');
    }

    public function getBalance($type, $user)
    {
        $purpose = $user->purpose->where('type',$type)->first();
        $balance = $purpose ? $purpose->available_balance : floatval(0.00);
        return $balance;
    }

    public function getHistory($type, $user)
    {
        $purpose = $user->purpose->where('type',$type)->first();
        $history = $purpose ? $purpose->transactions()->get() : null;
        return $history;
    }

    public function customerBalance()
    {
        $user = Auth::user();
        $balance = $this->getBalance(config('const.purpose.savings'),$user);
        $transactions = $this->getHistory(config('const.purpose.savings'), $user);
        return view('user.balance', compact('user', 'balance', 'transactions'));
    }

    public function customerCredits()
    {
        $user = Auth::user();
        $balance = $this->getBalance(config('const.purpose.credits'), $user);
        $transactions = $this->getHistory(config('const.purpose.credits'), $user);
        return view('user.credit',compact('user','balance','transactions'));
    }

    public function TransactionDetails(HistoryTransaction $transaction)
    {
        $user = Auth::user();
        return view('user.view-details',compact('user','transaction'));
    }

    public function payCreditForm()
    {
        $user = Auth::user();
        $balance = $this->getBalance(config('const.purpose.savings'),$user);
        $credits = $this->getBalance(config('const.purpose.credits'),$user);
        return view('user.pay-credit',compact('user','balance','credits'));
    }

    public function payCredit(TransactionRequest $request)
    {
        $user = Auth::user();
        $credit = $user->purpose->where('type',config('const.purpose.credits'))->first()->amount;
        $data = $request->all();
        if(floatval($data['amount']) > floatval($credit)){
            return redirect()->back()->with('error','Inputed value is greater than your credit balance');
        }
        $total = floatval($credit) - floatval($data['amount']);
        $data['available_balance'] = $total;
        $user->purpose->where('type',config('const.purpose.credits'))->first()->update([
            'amount' => $data['amount'],
            'available_balance' => $total
        ]);
        $user->purpose->where('type',config('const.purpose.credits'))->first()->transactions()->create($data);
        return redirect()->route('credits')->with('success','Successfully pay your credits from your savings');
    }

    public function about()
    {
        $user = Auth::user();
        return view('user.about',compact('user'));
    }

}
