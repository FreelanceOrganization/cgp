<?php

namespace App\Http\Managers;
use App\Models\User;
use App\Models\HistoryTransaction;
use Illuminate\Support\Facades\Hash;

class UserManager
{
    public function storeSavings($data)
    {
        $data['type'] = config('const.purpose.savings');
        $data['transaction_type'] = config('const.transactions.deposit');
        $this->storeData($data);
    }

    public function storeCredits($data)
    {
        $data['type'] = config('const.purpose.credits');
        $data['transaction_type'] = config('const.transactions.add_debts');
        $this->storeData($data);
    }

    public function storeData($data)
    {
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        $data['available_balance'] = $data['amount'];
        $user->address()->create($data);
        $this->savePurpose($user, $data);
    }

    public function savePurpose($user, $data)
    {
        $user->purpose()->create($data);
        $user->purpose()->latest()->first()->transactions()->create($data);
    }

    public function getUsers($type)
    {
        $users = User::where('role',false)->with(['purpose' => function($q) use ($type){
            $q->where('type','=',$type);
        }])->orderBy('created_at','desc')->get();

        return $users;
    }

    public function countCustomers()
    {
        $customers = User::where('role',config('const.user.customer'))->count();
        return $customers;
    }

    public function customerPurposes($type)
    {
        return [User::where('role',config('const.user.customer'))->with(['purpose' => function($q) use ($type) {
            $q->where('type',$type);
        }])->count()];

    }

    public function updateUser($data, $customer)
    {
        $update = $customer->update($data);
        if($update){
            $customer->address()->update([
                'sitio' => $data['sitio'],
                'barangay' => $data['barangay'],
                'municipality' => $data['municipality'],
                'province' => $data['province']
            ]);
        }
    }

    public function removeUser($request, $type)
    {
        $user = User::where('id',$request->customer_id)->with(['purpose' => function($q) use ($type){
            $q->where('type',$type);
        }])->first();
        if($user){
            $user->purpose->first()->delete();
            return true;
        }
        return false;
    }


    // History Transactions
    public function getHistory($type)
    {
        return HistoryTransaction::whereHas('purpose',function($q) use ($type){
            $q->where('type', '=', $type);
        })->orderBy('created_at', 'desc')->get();
    }
}
