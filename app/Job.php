<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
//    use SoftDeletes;

    protected $fillable = [
        'name',
        'category_id',
        'image',
        'status'
    ];

//    protected $with = ['category','tasks','workers'];

//    protected $with = ['tasks'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function workers(){
        return $this->belongsToMany(Worker::class, 'worker_job');
    }
}
