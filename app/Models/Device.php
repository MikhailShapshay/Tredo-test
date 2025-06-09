<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Device extends Model
{
    protected $fillable = ['user_id', 'device_token'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
