<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    protected $fillable = [
        'name', 'email', 'password', 'city_id', 'phone', 'image', 'rating', 'status', 'national_id_image'
    ];

    protected $with = ['city'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city(){

        return $this->belongsTo(City::class);

    }

    public function getStatusAttribute($status){
        return (boolean) $status;
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    /*
     * TODO
     * implement payment relation
     */
    public function payment(){

    }


}
