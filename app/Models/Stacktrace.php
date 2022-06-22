<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Stacktrace extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'code_snippet' => 'array',
    ];

    public function exception()
    {
        return $this->belongsTo(Exception::class);
    }

    public function isVendorFrame(): Attribute
    {
        return Attribute::make(
            get: fn (self $value) => Str::of($value->file)->contains('vendor'),
        );
    }
}
