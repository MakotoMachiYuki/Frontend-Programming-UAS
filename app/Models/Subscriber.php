<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Subscriber extends Model
{
    protected $collection = 'subscribers';

     protected $fillable = ['email'];
}
