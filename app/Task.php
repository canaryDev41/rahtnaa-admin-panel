<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
//    use SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'price',
        'measure',
        'job_id',
        'status',
    ];

    public function job(){
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function getStatusAttribute($status){
        return (boolean) $status;
    }
}
