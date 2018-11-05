<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed status
 * @property mixed worker_id
 * @property mixed user_id
 * @property mixed job_id
 * @property mixed total
 * @property mixed lat
 * @property mixed lng
 * @property mixed start_date
 * @property mixed end_date
 * @property mixed tasks
 */
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

    protected $casts = [
        'tasks' => 'object'
    ];

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function status()
    {
        switch ($this->status) {
            case 0:
                return 'ملغي';
                break;

            case 1:
                return 'تحت المعالجه';
                break;

            default :
                return 'اكتمل الطلب';
                break;
        }
    }

}
