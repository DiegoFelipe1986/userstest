<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index()
    {
    	return view('auth.register');
    }

    public function register(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ];

        $this->validate($request, $rules);

        $fields = $request->all();
        $fields['password'] = bcrypt($request->password);
        $fields['verified'] = User::USER_UNVERIFIED;
        $fields['verification_token'] = User::generateVerificationToken();
        $fields['type'] = User::USER_REGULAR;

        User::create($fields);

        return view('auth.verify-message');
    }
}
