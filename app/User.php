<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed status
 */
class User extends Model
{

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'city', 'phone', 'image', 'type', 'rating', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getStatusAttribute($status){

        return (boolean) $status;

    }

    public function city(){
        return $this->belongsTo(City::class);
    }
    
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
