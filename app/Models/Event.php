<?php

namespace App\Models;

use App\Enums\Event\EventStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;

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
        'format',
        'location_area',
         'status'

    ];

    protected function casts(): array  {
        return [
            // mengubah string status menjadi enums
            'status' => EventStatus::class,
            'start_date' => 'datetime',
            'end_date' => 'datetime',
            'registration_start' => 'datetime',
            'registration_end' => 'datetime',
        ];
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get:function(){
                if(!$this->event_image){
                    return asset('assets/image/card-image.png');
                }

                if(str_starts_with($this->event_image,'events/')){
                    /** @var FilesystemAdapter $disk */
                    $disk=Storage::disk('s3');

                    return $disk->url($this->event_image);
                }

                return asset(ltrim($this->event_image,'/'));
            }
        );
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
