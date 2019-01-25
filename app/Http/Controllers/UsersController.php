<?php

namespace sialens\Http\Controllers;

use Illuminate\Http\Request;

use sialens\User;
use sialens\Role;

class UsersController extends Controller

{
    public function __construct ()
    
        {
    
            $this->middleware('auth');
    
        }

    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['Gweinyddwr']);
        
        $users  = User::latest()->get();
        
        return view('users.index', compact('users'));
    }

    public function edit($id, Request $request)
    {
        $request->user()->authorizeRoles(['Gweinyddwr']);
        
        $user = User::find($id);
        
        $roles = \DB::table('roles')->get();
        
        return view('users.edit', compact('user','roles'));

    }

    public function setRole()
    {
        $user = User::find(request('user_id'));
        
        $user->roles()->attach(request('role_id'));
       
        return redirect('/users');
    }
    
}