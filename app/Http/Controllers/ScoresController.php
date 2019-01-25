<?php

namespace sialens\Http\Controllers;

use Illuminate\Http\Request;

use sialens\Score;

use sialens\Stats;

use sialens\Profile;

use sialens\School;

class ScoresController extends Controller
{
    //
    public function store()
    {
        # code...
        $score = new Score;

        $score->score = request('score');
        
        $score->profile_id = request('profile_id');
        
        $score->save();

        return $score;

    }

    public function profileStats($id) {

        $stats = New Stats;
        $stats->games_played = Score::where('profile_id', $id)->count();
        $stats->high = Score::with('score')->where('profile_id', $id)->max('score');
        $stats->low = Score::with('score')->where('profile_id', $id)->min('score');
        $stats->average = Score::with('score')->where('profile_id', $id)->avg('score');
        return $stats;

    }


    public function highScores() {

       $scoretable = Score::selectRaw('profile_id, profile_id as id,avg(score) as rating,count(score) as gamesplayed')
       ->groupBy('profile_id')
       ->havingRaw('count(score) > 9')
       ->orderBy('rating','desc')->limit(10)->get();
        return $scoretable; 
                    
    }

    public function highSchools() {
        $scoretable = Score::selectRaw('profile_id, profile_id as id,avg(score) as rating,count(score) as gamesplayed, profiles.class as class, profiles.school_id as school_id, profiles.id, schools.name')
        ->join('profiles','profile_id','=','profiles.id')
        ->join('schools', 'school_id','=', 'schools.id')
        ->groupBy('profile_id', 'class', 'school_id', 'profiles.id', 'schools.name')
        ->havingRaw('count(score) > 9')
        ->orderBy('rating','desc')->get();
         return $scoretable; 
    }

    public function topSchools() {
        $scoretable = Profile::selectRaw('profiles.school_id as school_id,schools.name, count(profiles.school_id) as school_size, avg(score) as rating, sum(score) as total')
        ->join('schools', 'school_id','=', 'schools.id')
        ->join('scores', 'scores.profile_id', '=', 'profiles.id')
        ->groupBy('schools.name', 'school_id')
        ->orderby('rating','desc')->get();
         return $scoretable; 

    }

    public function schoolStats($id) {
        $scoretable = Profile::selectRaw('profiles.school_id as school_id,schools.name, count(profiles.school_id) as games_played, avg(score) as rating, sum(score) as total, min(score) as low, max(score) as high')
        ->join('schools', 'school_id','=', 'schools.id')
        ->join('scores', 'scores.profile_id', '=', 'profiles.id')
        ->groupBy('schools.name', 'school_id')
        ->where('profiles.school_id', $id)
        ->orderby('rating','desc')->get();
         return $scoretable; 

    }

    

    public function topClass() {
        $scoretable = Profile::selectRaw('profiles.school_id as school_id,schools.name,profiles.class as class, count(profiles.class) as class_size, avg(score) as rating, sum(score) as total')
        ->join('schools', 'school_id','=', 'schools.id')
        ->join('scores', 'scores.profile_id', '=', 'profiles.id')
        ->groupBy('schools.name', 'class','school_id')
        ->orderby('rating', 'desc')->get();
         return $scoretable; 

    }


}
