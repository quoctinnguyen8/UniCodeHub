<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestCase extends Model
{
    protected $table = 'test_cases';
    protected $fillable = ['exercises_id', 'input', 'expected_output'];
    public function exercise()
    {
        return $this->belongsTo(Exercises::class, 'exercises_id');
    }

}
