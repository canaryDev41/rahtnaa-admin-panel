<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use function MongoDB\BSON\fromJSON;
use function MongoDB\BSON\toJSON;

/**
 * @property mixed status
 * @property mixed id
 * @property mixed worker_id
 * @property mixed user_id
 * @property mixed job_id
 * @property mixed total
 * @property mixed lat
 * @property mixed lng
 * @property mixed start_date
 * @property mixed end_date
 * @property mixed tasks
 * @property mixed job
 * @property mixed user
 * @property mixed worker
 */
class Order extends Model
{

//    use Searchable;

//    public $asYouType = false;

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

//    /**
//     * Get the indexable data array for the model.
//     *
//     * @return array
//     */
//    public function toSearchableArray()
//    {
//        $array = $this->toArray();
//
//        $worker = $this->worker()->get(['name'])->map( function ($worker) {
//            return $worker['name'];
//        });
//
//        $array['worker'] = implode(' ', $worker->toArray());
//
//        $user = $this->user()->get(['name'])->map( function ($user) {
//            return $user['name'];
//        });
//
//        $array['user'] = implode(' ', $user->toArray());
//
//        $job = $this->job()->get(['name'])->map( function ($job) {
//            return $job['name'];
//        });
//
//        $array['job'] = implode(' ', $job->toArray());
//
//        return $array;
//
//    }

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

    public function statusColor()
    {
        if ($this->status == 0) {
            return '#f44336';
        } elseif ($this->status == 1 and $this->worker_id == null) {
            return '#00bcd4';
        } elseif ($this->status == 1 and $this->worker_id != null) {
            return '#ffc107';
        } else {
            return '#4caf50';
        }
    }

    public function status()
    {
        if ($this->status == 0) {
            return 'ملغي';
        } elseif ($this->status == 1 and $this->worker_id == null) {
            return 'جديد';
        } elseif ($this->status == 1 && $this->worker_id != null) {
            return 'تحت المعالجه';
        } else {
            return 'اكتمل الطلب';
        }
    }

    public function scopeToday($qurey)
    {
        return $qurey->whereDate('created_at', Carbon::today());
    }

    public function scopeYesterday($qurey)
    {
        return $qurey->whereDate('created_at', Carbon::yesterday());
    }
}
