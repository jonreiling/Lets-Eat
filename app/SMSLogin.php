<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmsLogin extends Model
{
    //
  public $fillable = ['phone', 'token','passback_token'];
}
