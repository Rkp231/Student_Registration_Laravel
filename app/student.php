<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable=['name','password','cpassword','gender','address','state','mobile','email'];
}
