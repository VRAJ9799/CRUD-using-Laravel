<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable=[
      'FirstName','LastName','Gender','Hobbies','Address','Company','Password'
    ];
    protected $hidden=[
        'Password'
    ];
    public function setPasswordAttribute($value)
    {
        $this->attributes['Password'] = bcrypt($value);
    }
}
