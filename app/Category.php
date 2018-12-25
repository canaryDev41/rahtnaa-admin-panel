<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property bool status
 * @property string name
 */
class Category extends Model
{
//    use SoftDeletes;

    protected $with = ['jobs'];

    protected $fillable = [
        'name'
    ];
    
    public function jobs(){
        return $this->hasMany(Job::class);
    }

    public function status(){
        return (bool)$this->status ? 'فعال' : 'غير فعال';
    }

    public function getStatusAttribute($status){
        return (bool) $status;
    }
}
