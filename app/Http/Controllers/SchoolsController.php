<?php

namespace sialens\Http\Controllers;

use Illuminate\Http\Request;

use sialens\School;


class SchoolsController extends Controller
{

    public function __construct ()

    {

        $this->middleware('auth')->except(['index','show']);

    }

    public function index()
    
    {
    
        $schools  = School::latest()->get();
    
        return view('schools.index', compact('schools'));
    
    }

    public function show(School $school)
    
    {
        
        return view('schools.show', compact('school'));
    }

    public function create(Request $request)
    
    {
        $request->user()->authorizeRoles(['Gweinyddwr']);
        return view('schools.create');
    
    }

    public function edit($id){
        //get post data by id
        $school = School::find($id);
        
        //load form view
        return view('schools.edit', ['school' => $school]);
    }
    public function update($id, Request $request){
        //validate post data
        $this->validate($request, [
            'name' => 'required'
        ]);
        
        //get post data
        $schoolData = $request->all();
        
        //update post data
        School::find($id)->update($schoolData);
        
        return redirect('/');
    }

    public function store()
    {
        # code...
        
        $this->validate(request(),   [              
             'name' => 'required'         
              ]);
        

   
        $data = new School;
        $data->name = request('name'); 
        $data->user_id= auth()->id();
        $data->save();
        return redirect('/ysgolion');
       
    }
}
