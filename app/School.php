<?php

namespace sialens;

class School extends Model
{
     

    public function user()
    
    {
    
      return $this->belongsTo(User::class);
    
    }
  
    
}