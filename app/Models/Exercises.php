<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Exercises;

class Exercises extends Model
{
    protected $table = 'exercises';
    protected $fillable = ['title', 'description'];
   
}
