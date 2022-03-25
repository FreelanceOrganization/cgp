<?php

namespace App\Http\Managers;
use App\Models\User;
use App\Models\Purpose;
use App\Models\HistoryTransaction;

class UserManager
{
    public function storeSavings($data)
    {
        $data['type'] = Purpose::SAVINGS;
        $data['transaction_type'] = HistoryTransaction::TYPE_DEPOSIT;
        $this->storeData($data);
    }

    public function storeCredits($data)
    {
        $data['type'] = Purpose::CREDITS;
        $data['transaction_type'] = HistoryTransaction::TYPE_ADD_DEBTS;
        $this->storeData($data);
    }

    public function storeData($data)
    {
        $user = User::create($data);
        $data['available_balance'] = $data['amount'];
        $user->address()->create($data);
        $this->savePurpose($user, $data);
        $this->saveTransactions($user, $data);
    }

    public function saveTransactions($user, $data)
    {
        $user->purpose()->latest()->first()->transactions()->create($data);
    }

    public function savePurpose($user, $data)
    {
        $user->purpose()->create($data);
    }

    public function getUsers($type)
    {
        $users = User::where('role',false)->whereHas('purpose',function($q) use ($type){
            $q->where('type','=',$type);
        })->orderBy('created_at','desc')->get();

        return $users;
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
        $user = User::where('id',$request->customer_id)->whereHas('purpose',function($q) use ($type){
            $q->where('type',$type);
        })->first();

        if($user){
            $user->purpose()->delete();
            return true;
        }
        return false;
    }
}
