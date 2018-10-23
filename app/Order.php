<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'worker_id',
        'user_id',
        'job_id',
        'total',
        'lat',
        'lng',
        'start_date',
        'end_date',
        'tasks',
        'status',
    ];
    
    public function worker(){
        return $this->belongsTo(Worker::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function job(){
        return $this->belongsTo(Job::class);
    }

}
