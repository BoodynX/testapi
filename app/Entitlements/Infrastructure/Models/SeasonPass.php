<?php

namespace App\Entitlements\Infrastructure\Models;

use App\User\Infrastructure\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class SeasonPass extends Model
{
    /** @var array */
    protected $fillable = [
        'name'
    ];

    public function users(): MorphToMany
    {
        return $this->morphToMany(User::class, 'entitlement');
    }
}
