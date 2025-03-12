<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiLogs extends Model
{
    protected $table = 'api_logs';
    protected $fillable = [
        'submission_id',
        'api_endpoint',
        'request_body',
        'response_body',
        'status_code',
    ];
}
