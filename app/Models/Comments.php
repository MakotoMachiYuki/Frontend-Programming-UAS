<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Comments extends Model
{
    protected $collection = 'comments';
}