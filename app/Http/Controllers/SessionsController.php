<?php

namespace sialens\Http\Controllers;

use sialens\User;

class SessionsController extends Controller
{
    
    public function __construct() 

    {

       $this->middleware('guest',['except' => 'destroy']);

    }

 
    public function create()
    {
        return view('sessions.create');
    }

    public function destroy()
    {
       auth()->logout();

       return redirect('/');
    }

    public function store()
    {
        # code...
       if(! auth()->attempt(request(['email','password']))) {

        

        return back()->withErrors([
       
         'message' => 'Please check you credentials and try again'

           ]);
       }

       return redirect('/');
    }


   
}
