<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';
    protected $fillable = [
        'marca',
        'modello',
        'cilindrata',
        'porte',
        'img',
        'category_id'
    ];
    public function category() {
        return $this->belongTo('App\Category');
    }
}
