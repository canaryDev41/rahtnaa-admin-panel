<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'id',
        'name',
        'price',
        'measure',
        'job_id',
        'status',
    ];

    public function job(){
        return $this->belongsTo(Job::class);
    }

    public function getStatusAttribute($status){
        return (boolean) $status;
    }
}
