<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'id', 
        'name', 
        'email',
        'contact_number',
        'position'
    ];
}