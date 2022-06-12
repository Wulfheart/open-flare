<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exception extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id',
        'tracking_uuid',
        'notifier',
        'language',
        'framework_version',
        'language_version',
        'exception_class',
        'seen_at',
        'message',
        'stage',
        'message_level',
        'application_version',
        'git_hash',
        'git_message',
        'git_tag',
        'git_remote',
        'git_isDirty',
        'session',
        'cookies',
        'route',
        'env',
        'request',
        'request_data_query_string',
        'request_data_body',
        'request_data_files',
        'headers',
        'user_id',
        'user',
        'similarity_hash',
    ];

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
