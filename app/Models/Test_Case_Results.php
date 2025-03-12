<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test_Case_Results extends Model
{
    protected $table = 'test_case_results';
    protected $fillable = ['submission_id', 'test_case_id', 'actual_output', 'is_passed'];

    public function submission()
    {
        return $this->belongsTo(Submissions::class);
    }
}
