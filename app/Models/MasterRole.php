<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MasterRole extends Model
{
    use HasFactory;

    protected $table = 'master_role';

    protected $fillable = [
        'role_name',
        'role_label',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_role', 'master_role_id', 'user_id');
    }
}   