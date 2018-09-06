<?php

namespace App\Core\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Package extends Model
{
    /** @var array */
    protected $fillable = [
        'name'
    ];

    public function vods(): BelongsToMany
    {
        return $this->belongsToMany(Vod::class);
    }

    public function users(): MorphToMany
    {
        return $this->morphToMany(User::class, 'entitlement');
    }
}
