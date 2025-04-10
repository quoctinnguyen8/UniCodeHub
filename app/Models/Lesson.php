<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;

class Lesson extends Model
{
    
    use HasFactory;
    protected $fillable = [
        'id',
        'category_id',
        'title',
        'name',
        'content',
        'description'
    ];
    public function category(){
        return $this->belongsTo(LessonCategory::class, 'category_id', 'id');
        
    }

}



