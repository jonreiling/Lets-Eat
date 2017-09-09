<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UserGroup extends Model
{
    //
    use Notifiable;

    protected $fillable = [
        'name','creator_id'
    ];  

    public function users()
    {
        return $this->belongsToMany('App\User');
    }    

    public function lists()
    {
        return $this->hasMany('App\GroupList');
    }       
}
