<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name'
    ];
    
    public function users(){
        return $this->hasMany(User::class);
    }

    public function workers(){
        return $this->hasMany(Worker::class);
    }
}
