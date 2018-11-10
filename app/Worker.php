<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed image
 * @property mixed name
 * @property mixed city_id
 * @property mixed phone
 * @property mixed email
 * @property mixed national_id_image
 * @property mixed status
 * @property mixed password
 */
class Worker extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'city_id',
        'phone',
        'image',
        'rating',
        'status',
        'national_id_image'
    ];

    //TODO remove with property from the model!
    protected $with = ['city'];

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
        return $this->belongsToMany(Job::class, 'worker_job');
    }

}
