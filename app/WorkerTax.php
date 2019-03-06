<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property  integer worker_id
 * @property  string total
 */
class WorkerTax extends Model
{
    protected $fillable = [
        'worker_id',
        'total',
    ];

    protected $table = 'worker_tax';
}
