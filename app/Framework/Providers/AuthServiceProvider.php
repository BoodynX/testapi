<?php

namespace App\Framework\Providers;

use App\Entitlements\Application\Policies\PpvPolicy;
use App\Entitlements\Infrastructure\Models\Ppv;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Ppv::class => PpvPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
