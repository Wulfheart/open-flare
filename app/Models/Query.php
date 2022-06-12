<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'exception_id',
        'sql',
        'time',
        'connection_name',
        'bindings',
        'microtime',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'bindings' => 'array',
    ];

    public function exception()
    {
        return $this->belongsTo(Exception::class);
    }
}
