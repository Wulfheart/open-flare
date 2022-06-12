<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stacktrace extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'exception_id',
        'ordinal_number',
        'file',
        'line_number',
        'method',
        'class',
        'code_snippet',
        'application_frame',
    ];

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
}
