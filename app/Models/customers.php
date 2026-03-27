<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    use HasFactory;

    // This tells Laravel exactly which columns can be filled by the user
    protected $fillable = [
        'name', 
        'address', 
        'gender', 
        'dob'
    ];
}