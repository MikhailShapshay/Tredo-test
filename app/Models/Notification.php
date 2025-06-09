<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Notification extends Model
{
    protected $fillable = [
        'title',
        'body',
        'scheduled_at',
    ];

    protected $dates = [
        'scheduled_at',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];

    public function logs(): HasMany
    {
        return $this->hasMany(NotificationLog::class);
    }
}
