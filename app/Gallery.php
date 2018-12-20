<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
//    use SoftDeletes;

    protected $fillable = [
        'image',
        'description',
        'worker_id',
        'job_id',
        'status'
    ];

    public function worker(){
        return $this->belongsTo(Worker::class);
    }
    
    public function job(){
        return $this->belongsTo(Job::class);
    }

}
