<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Ppv extends Model
{
    /** @var array */
    protected $fillable = [
        'name'
    ];

    public function users(): MorphMany
    {
        return $this->morphMany(User::class, 'entitlement');
    }
}
