<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
}
