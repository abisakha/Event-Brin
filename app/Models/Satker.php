<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Satker extends Model
{
    protected $table = 'satker';

    protected $fillable = [
        'id',
        'unit_name',
        'status',
    ];

    protected function casts(): array {
        return [
            'status' => 'boolean',
        ];
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'satker_id');
    }
    public function events(): HasMany
    {
        return $this->hasMany(Event::class, 'satker_id');
    }
}
