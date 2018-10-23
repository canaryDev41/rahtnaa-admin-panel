<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'name',
        'category',
        'image',
        'status'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
