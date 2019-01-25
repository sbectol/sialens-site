<?php

namespace sialens;

class Avatar extends Model
{
     



    public function profile()
    
    {
    
      return $this->belongsTo(Profile::class);
    
    }
  
    
}