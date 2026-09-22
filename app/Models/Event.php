<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Event extends Model
{
    protected $table = 'event';

    protected $fillable = [
        'satker_id',
        'satker_name',
        'user_id',
        'event_name',
        'event_image',
        'description',
        'location',
        'start_date',
        'end_date',
        'registration_start',
        'registration_end',
        'quota',
        'status',
    ];

    protected function casts(): array  {
        return [
            'start_date' => 'datetime',
            'end_date' => 'datetime',
            'registration_start' => 'datetime',
            'registration_end' => 'datetime',
        ];
    }

    public function satker(): BelongsTo
    {
        return $this->belongsTo(Satker::class, 'satker_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class, 'event_id');
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class, 'event_id');
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class, 'event_id');
    }

    public function survey(): HasOne
    {
        return $this->hasOne(Survey::class, 'event_id');
    }
}
