<?php
namespace App\Http\Controllers\User;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('administrator')->only('showFormUserAgent', 'createUserAgent');
    }
    public function showFormUserAgent()
    {
        return view('user.create-agent');
    }
    public function createUserAgent(Request $request)
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
        $fields['type'] = User::USER_AGENT;
        User::create($fields);
        return Redirect()->back()->with('message', 'The User agent was created');
    }
    public function verify($token)
    {
        $user = User::whereVerificationToken($token)->firstOrFail();
        $user->verified = User::USER_VERIFIED;
        $user->verification_token = null;
        $user->save();
        return Redirect(route('login'));
    }


}
