<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
 * @property mixed note
 * @property mixed worker
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
        'note',
    ];

    protected $casts = [
        'tasks' => 'object'
    ];

    public static function search(Request $request)
    {

        $orders = Order::with('job', 'worker');

        if ($request->workerName or $request->workerPhone) {

            $workersIds = null;

            if ($request->workerName)
                $workersIds = DB::table('workers')->where('name', 'like', '%' . $request->workerName . '%')->get(['id']);

            if ($request->workerPhone)
                $workersIds = DB::table('workers')->where('phone', 'like', '%' . $request->workerPhone . '%')->get(['id']);

            $workers = [];

            foreach ($workersIds as $workersId) {
                array_push($workers, $workersId->id);
            }

            $orders->whereIn('worker_id', $workers);
        }

        if ($request->userName or $request->userPhone) {

            $usersIds = null;

            if ($request->userName)
                $usersIds = DB::table('users')->where('name', 'like', '%' . $request->userName . '%')->get(['id']);

            if ($request->userPhone)
                $usersIds = DB::table('users')->where('phone', 'like', '%' . $request->userPhone . '%')->get(['id']);

            $users = [];

            foreach ($usersIds as $usersId) {
                array_push($users, $usersId->id);
            }

            $orders->whereIn('user_id', $users);
        }


        if ($request->job_id) {
            $orders->where('job_id', request('job_id'));
        }

        return $orders->orderBy('id', 'DESC')->paginate(10);

    }

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
        } elseif ($this->status == 1 and $this->worker_id != null) {
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
