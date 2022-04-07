<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function form()
    {
        $user = Auth::user();
        if($user && $user->role == config('const.user.admin')){
            return redirect()->route('admin.dashboard');
        }
        if($user && $user->role == config('const.user.customer')){
            return redirect()->route('customer');
        }
        return view('auth.login');
    }

    public function login(AuthRequest $request)
    {
        $data = $request->except(['_token']);
        if (Auth::attempt($data)) {
            $user = User::where('email',$request->email)->where('role',0)->first();
            if($user){
                return redirect()->route('customer');
            }
            return redirect()->route('admin.dashboard');
        }
    }

    public function logout()
    {
        $user = Auth::user();
        Auth::logout();
        return redirect('/');
    }
}
