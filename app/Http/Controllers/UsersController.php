<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function create() {
        return view('Users.register');
    }
    public function store(RegistrationRequest $request) {
      
       
        User::create([
              'name' => request('name'),
              'email' => request('email'),
              'password' => Hash::make(request('password'))
          
        ]);
        return redirect('/login');
    }
        public function loginForm() {
        return view('Users.login');
        }
    public function login(Request $request) {
        $user = User::where('email', $request->email)->first();
        if(!$user ||  !Hash::check(request('password'), $user->password)) {
            return back()->withErrors(['errorMessage' => 'Email or Password are incorrect!']);
        }

        Auth::login($user);

       return redirect('/register');
    }



    public function logout() {

        Auth::logout();

        return redirect('/login');
    }


 
  
}
