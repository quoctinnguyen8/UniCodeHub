<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submissions extends Model
{
    protected $table = 'submissions';
    protected $fillable = ['exercise_id', 'user_id', 'source_code', 'score', 'title', 'description', 'file_path'];
}
