<?php

namespace sialens;

class Profile extends Model
{
     
    public function avatar() 

    {

        return $this->belongsTo(Avatar::class);

    }

    public function user()
    
    {
    
      return $this->belongsTo(User::class);
    
    }

    public function school()

    {

        return $this->belongsTo(School::class);

    }
  
}