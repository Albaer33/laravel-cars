<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Optional extends Model
{
    public function optional(){
        return $this->belongsToMany('App\Car');
    }
}
