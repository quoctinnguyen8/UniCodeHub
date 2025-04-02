<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminActiveLogs extends Model
{
    protected $table = 'admin_active_logs';
    protected $fillable = [
        'active',
        'expires_at',
        'activated_at',
        'user_id',
        'created_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
