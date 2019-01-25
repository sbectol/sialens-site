<?php

namespace sialens\Http\Controllers;

use Illuminate\Http\Request;
use sialens\Avatar;
use Image;


class AvatarsController extends Controller
{
    //
    public function hasAvatar($id)
    {
        
        if(Avatar::find($id)) {
            return "true";
        } else {
            return "false";
        }
    
        
    }

    public function getAvatar($id) 
    
    {
        
        $avatar = Avatar::where("profile_id", "=", $id)->get()->last();

        if(!$avatar) {
            $avatar= new Avatar;
            $avatar->found = false;
            return $avatar;
            
        } else {
            return $avatar;
        }

        
    }
    
    public function create()
    {
        return view('avatar.create');
    }


    public function store(Request $request)

    {
        $data = new Avatar;

        $data->hair = request('hair');

        $data->face = request('face');

        $data->glasses = request('glasses');

        $data->uniform = request('school');

        $data->eyes = request('eyes');

        $data->nose = request('nose');

        $data->profile_id = request('profile_id');
        
        $data->save();

        $publicpath ='/var/www/sialens/public/';

        $img = Image::make($publicpath . 'images/uniforms/' . request('school') . '.png'); 

        $img->insert($publicpath . 'images/faces/'.request('face').'.png');

        $img->insert($publicpath . 'images/eyes/'.request('eyes').'.png');

        $img->insert($publicpath . 'images/glasses/'.request('glasses').'.png');

        $img->insert($publicpath . 'images/hair/'.request('hair').'.png');

        $img->save($publicpath . 'images/avatars/'.request('profile_id').'.png');

        $img->heighten(100);

        $img->save($publicpath . 'images/avatars/thumbs/'.request('profile_id').'.png');




        return $data;
    }

}
