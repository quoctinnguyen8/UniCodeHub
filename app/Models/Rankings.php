<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Rankings extends Model
{
    use HasFactory;
    protected $table = 'rankings';
    protected $fillable = [
        'user_id',
        'total_score',
        'period',
        'start_date',
        'end_date',
    ];
    protected $dates = [
        'start_date',
        'end_date',
    ];
    
}
