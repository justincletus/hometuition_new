<?php

namespace App;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;


class Contact extends Model
{
    protected $fillable = ['firstname', 'lastname','email','phone','message','number'];
}
