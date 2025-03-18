<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'category_id',
        'title',
        'content',
        'created_by'
    ];

    public function category(){
        return $this->belongsTo(LessonCategory::class, 'category_id'); 
    }
}
