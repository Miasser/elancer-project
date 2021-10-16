<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view("auth.registration");

    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required | email |unique:users',
            'password' => 'required |max:12|min:5'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if ($res) {
            return  redirect('links');
            //return back()->with('success', 'You have registered successfully');
        } else {

            return back()->with('fail', 'Something wrong');

        }
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required | email',
            'password' => 'required |max:12|min:5'
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->Session()->put('loginId', $user->id);
                return redirect('dashboard');

            } else {
                return back()->with('fail', 'This password is not matches');

            }

        } else {
            return back()->with('fail', 'This email is not registered');


        }
    }

    public function dashboard()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        // return "Welcome!! To your dashboard";
        return view('auth/dashboard', compact('data'));
    }

    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('login');
        }
   return view('links');

    }

   /* public function getData(Request $req){
        $req->validate([
            'username'=>'required | max:10',
            'password'=>'required | min:5 '
        ]);
        return $req->input();

    }
   */


}
