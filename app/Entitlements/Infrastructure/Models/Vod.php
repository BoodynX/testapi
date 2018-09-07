<?php

namespace App\Entitlements\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vod extends Model
{
    /** @var array */
    protected $fillable = [
        'name'
    ];

    public function packages(): BelongsToMany
    {
        return $this->belongsToMany(Package::class);
    }
}
