<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

/**
 * @property mixed image
 * @property mixed name
 * @property mixed city_id
 * @property mixed phone
 * @property mixed email
 * @property mixed national_id_image
 * @property mixed status
 * @property mixed password
 * @property mixed id
 */
class Worker extends Model
{

//    use SoftDeletes;

//    use Searchable;

    public $asYouType = true;

    protected $with = ['city', 'orders'];

    protected $fillable = [
        'id',
        'name',
        'city_id',
        'phone',
        'image',
        'rating',
        'status',
        'work_status',
        'national_id_image'
    ];

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function getStatusAttribute($status)
    {
        return (boolean)$status;
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /*
     * TODO
     * implement payment relation
     */
    public function payment()
    {
        return $this->belongsTo(Worker::class);
    }

    public function jobs(){
        return $this->belongsToMany(Job::class, 'worker_job', 'worker_id');
    }

    public function galleries(){
        return $this->hasMany(Gallery::class);
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

}
