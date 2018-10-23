<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $table = 'worker';

    protected $fillable = [
        'name', 'email', 'password', 'city_id', 'phone', 'image', 'rating', 'status', 'national_id_image'
    ];

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
