<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exception extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'seen_at' => 'datetime',
        'git_isDirty' => 'boolean',
        'session' => 'array',
        'cookies' => 'array',
        'route' => 'array',
        'env' => 'array',
        'command_args' => 'array',
        'request' => 'array',
        'request_data_query_string' => 'array',
        'request_data_body' => 'array',
        'request_data_files' => 'array',
        'headers' => 'array',
        'user' => 'array',
    ];

    public function logs()
    {
        return $this->hasMany(Log::class);
    }

    public function queries()
    {
        return $this->hasMany(Query::class);
    }

    public function stacktraces()
    {
        return $this->hasMany(Stacktrace::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
