<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dog extends Model{
    protected $table = 'dogs';
    
    public function owner(){
        return $this->hasMany('App\Owner', 'id', 'owners_id');
    }
}
