<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

// use App\Models\User;

class Usercontroller extends Controller
{
    public function create(){
        return view('user.register');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'name'=>'required',
            'email'=>['required' , Rule::unique('users', 'email')],
            'password'=>  'required|confirmed|min:6'

        ]);

        $user = User::create($formFields);

        return redirect('/');
    }

    public function login(){
        return view('user.login');
    }

    public function authenticate(Request $request){
        $formFields = $request->validate([
            
            'email' => ['required','email'],

            'password' => 'required'


            

        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message','You are now logged in');

        }
        {
            return back()->withErrors(['email'=>'Invalid Creadentials'])->onlyInput('email');
        }
    }

    // Logout user
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 
        return redirect('/login')->with('message','You have been logout');
    }
}
