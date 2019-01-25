<?php

namespace sialens;

class Question extends Model
{
     
    public function scopeApproved($query)
    
    {
        
        return $query->where('approved',1);

    }



    public function scopeNotApproved($query)
    
    {
        
        return $query->where('approved',0);

    }

    public function option()
    
    {
    
        return $this->hasMany(Option::class);
    
    }

    public function user()
    
    {
    
      return $this->belongsTo(User::class);
    
    }
  
}
