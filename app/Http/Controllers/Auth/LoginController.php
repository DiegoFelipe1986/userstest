<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Session::flush();
        return Redirect::to('/');
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $this->validate($request, $rules);

        $credentials = $request->only('email', 'password');
        $credentials['verified'] = 1;
        if (!auth()->attempt($credentials)) {
            return Redirect(route('login'));
        }

        return Redirect(route('admin'));
    }
}
