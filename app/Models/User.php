<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Registration;
use App\Models\Satker;
use App\Models\SurveyAnswer;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['username_intra', 'satker_id', 'satker_name', 'user_type', 'name', 'email', 'password', 'status'])]
#[Hidden(['password'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'status' => 'boolean',
        ];
    }

    public function satker(): BelongsTo
    {
        return $this->belongsTo(Satker::class, 'satker_id');
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class, 'user_id');
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class, 'user_id');
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class, 'user_id');
    }

    public function surveyAnswers(): HasMany
    {
        return $this->hasMany(SurveyAnswer::class, 'user_id');
    }
     public function roles(): BelongsToMany
    {
        return $this->belongsToMany(MasterRole::class, 'user_role', 'user_id', 'master_role_id');
    }
    public function hasRole(string $roleName): bool
    {
        return $this->roles()->where('name', $roleName)->exists();
    }


}






