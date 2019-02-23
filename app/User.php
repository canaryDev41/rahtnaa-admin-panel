<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Laravel\Scout\Searchable;

/**
 * @property mixed status
 * @property mixed name
 * @property mixed phone
 */
class User extends Model
{

//    use Searchable;

    protected $table = 'users';

    protected $with = ['city', 'orders'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'city_id', 'phone', 'image', 'status'
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

    public static function search(Request $request)
    {

        $users = User::with('city');

        if ($request->name){
            $users->where('name', 'like', '%' .$request->name. '%');
        }

        if ($request->phone){
            $users->where('phone', 'like', '%' . $request->phone . '%');
        }

        if ($request->city_id){
            $users->where('city_id', $request->city_id);
        }

        return $users->orderBy('id', 'DESC')->paginate(10);

    }


    public function city(){
        return $this->belongsTo(City::class);
    }
    
    public function orders(){
        return $this->hasMany(Order::class);
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
