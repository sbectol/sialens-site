<?php

namespace sialens;

class Score extends Model
{
  public function profile()

  {
  
    return $this->belongsTo(Profile::class);
  
  }


  
}