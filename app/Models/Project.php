<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $casts = [
        'technologies' => 'array', // JSON → Array
        'created_at' => 'datetime', // String → Carbon DateTime
        'updated_at' => 'datetime', // String → Carbon Date
    ];

}