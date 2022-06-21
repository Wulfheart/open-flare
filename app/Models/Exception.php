<?php

namespace App\Models;

use App\DTO\Context\Context;
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
        'context' => 'array'
    ];

    public function stacktraces(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Stacktrace::class);
    }

    public function project(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    protected function ctx(): Attribute {
        return Attribute::make(
            get: function (self $value) {
               return new Context($this->context);
            }
        );
}

    protected function type(): Attribute {
        return Attribute::make(
            get: function(self $value) {
                if(collect($value->ctx->arguments)->contains(fn(string $elem) => $elem === "queue:work")){
                    return ExceptionTypeEnum::QUEUE;
                }

                if(count($value->ctx->arguments) > 0){
                    return ExceptionTypeEnum::CLI;
                }

                return ExceptionTypeEnum::WEB;

            }
        );
    }
}
