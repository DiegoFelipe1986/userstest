<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::all();
        return view('admin.index')->with('users', $users);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return Redirect()->back()->with('message', 'The User agent was erased');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('auth.edit')->with('user',$user);
    }

    Public function update(Request $request )
    {
        $id = $request["id"];
        $user  = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->type = $request->type;
        $user->save();
        return Redirect()->back()->with('message', 'The User agent was updated');
    }
}
