<?php

namespace App\Models;

use App\Enums\ExceptionTypeEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

    public function logs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Log::class);
    }

    public function queries(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Query::class);
    }

    public function stacktraces(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Stacktrace::class);
    }

    public function project(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    protected function type(): Attribute {
        return Attribute::make(
            get: function(self $value) {
                if(collect($value->command_args)->contains(fn(string $elem) => $elem === "queue:work")){
                    return ExceptionTypeEnum::QUEUE;
                }

                if(count($value->command_args) > 0){
                    return ExceptionTypeEnum::CLI;
                }

                return ExceptionTypeEnum::WEB;

            }
        );
    }
}
