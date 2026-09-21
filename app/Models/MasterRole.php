<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MasterRole extends Model
{
    protected $table = 'master_role';

    protected $fillable = [
        'name',
        'role_intra',
    ];

    public function userRoles(): HasMany
    {
        return $this->hasMany(UserRole::class, 'master_role_id');
    }
}
