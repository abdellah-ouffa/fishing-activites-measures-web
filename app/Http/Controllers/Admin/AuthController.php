<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $admin = Admin::where([
            'email' => $request->email        
        ])->first();


        if($admin && \Hash::check($request->password, $admin->password)) {
            Auth::loginUsingId($admin->user->id);
            return redirect()->route('home');
        }

        return redirect()->route('login');
    }
}
