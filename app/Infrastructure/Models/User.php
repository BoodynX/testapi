<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /** @var array */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /* @var array */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function packages(): MorphToMany
    {
        return $this->morphedByMany(Package::class, 'entitlement');
    }

    public function ppvs(): MorphToMany
    {
        return $this->morphedByMany(Ppv::class, 'entitlement');
    }

    public function seasonPasses(): MorphToMany
    {
        return $this->morphedByMany(SeasonPass::class, 'entitlement');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
