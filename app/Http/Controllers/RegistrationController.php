<?php

namespace sialens\Http\Controllers;

use Illuminate\Http\Request;
use sialens\User;

class RegistrationController extends Controller
{
   public function create(Request $request)
   {
    $request->user()->authorizeRoles(['Gweinyddwr']);
    
    return view('register.create');
   }

   public function store()
   {
       $this->validate(request(), [

           'name' => 'required',

           'email' => 'required|email',

           'password' => 'required|confirmed',
       ]);

       $user = User::create([
        'name' => request('name'), 
        'email' => request('email'),
        'password' => bcrypt(request('password'))
        ]);

      // auth()->login($user);

       return redirect('/users');   
   }

}
