<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'worker_id',
        'type',
        'bank_name',
        'account',
        'amount',
        'status',
    ];
    
    public function worker(){
        return $this->belongsTo(Worker::class);
    }
}
