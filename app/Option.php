<?php

namespace sialens;

class Option extends Model
{
  public function question()

  {
  
    return $this->belongsTo(Question::class);
  
  }

  public function user()
  
  {
  
    return $this->belongsTo(User::class);
  
  }
  
}
