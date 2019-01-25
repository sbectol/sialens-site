<?php

namespace sialens\Http\Controllers;

use Illuminate\Http\Request;

use sialens\Profile;
use sialens\School;

class ProfilesController extends Controller
{
    public function __construct ()
    
        {
    
            $this->middleware('auth')->except(['index','show']);
    
        }
    
        public function index($id = 1, Request $request)
        
        {
        
            $request->user()->authorizeRoles(['Gweinyddwr', 'Rheolwr']);
            
            $schools = \DB::table('schools')->get();

            $profiles  = Profile::where('school_id','=', $id)->orderBy('id', 'asc')->paginate(21);
        
            return view('profiles.index', compact('profiles','schools'));
        
        }
    
        public function show(Profile $profile)
        
        {
        
            return view('profiles.show', compact('profile'));

        }
    
        public function create(Request $request)
        
        {

            $request->user()->authorizeRoles(['Gweinyddwr']);

            $schools = \DB::table('schools')->get();
            
            return view('profiles.create', ['schools'=>$schools]);
        
        }
    
        public function edit($id, Request $request)
        
        {

            $request->user()->authorizeRoles(['Gweinyddwr']);
           
            $profile = Profile::find($id);
            
            return view('profiles.edit', ['profile' => $profile]);

        }

        public function update($id, Request $request){
            
            $this->validate($request, [

                'name' => 'required'

            ]);
         
            $profileData = $request->all();
        
            Profile::find($id)->update($profileData);
      
            return redirect('/');

        }
    
        public function store()
        {
            
            $this->validate(request(),   [ 

                 'nifer' => 'required'         
                
                 ]);

            $i=0;

            while ($i < request('nifer')) 
            
            {
            
                $i++;
            
                $data = new Profile;
    
                $data->school_id = request('school_id'); 

                $data->class = request('class');
    
                $data->user_id= auth()->id();
    
                $data->save();

            }
    
            return redirect('/proffil/'.$data->school_id);
           
        }
}
