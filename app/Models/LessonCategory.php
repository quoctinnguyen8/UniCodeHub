<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonCategory extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'category_id',
        'title',
        'name',
        'description',
        'content',
        'created_by'
    ];

    public function category(){
        return $this->hasMany(Lesson::class, 'category_id');
        // return $this->belongsTo(LessonCategory::class, 'category_id'); 
    }
}
