<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonCategory extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'name',
        'description'
    ];
    public function lessons(){
        return $this->hasMary(Lesson::class, 'category_id');
    }
}
