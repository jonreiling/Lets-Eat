<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'password','email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','sms_password','remember_token',
    ];


    public function groups()
    {
        return $this->belongsToMany('App\UserGroup');
    }

    public function findForPassport($username) {

        return $this->where('phone', $username)->first();
    }

    
    public function validateForPassportPasswordGrant( $pass ) {

        return ( $this->sms_password != "" && $pass == $this->sms_password );

    }

}
