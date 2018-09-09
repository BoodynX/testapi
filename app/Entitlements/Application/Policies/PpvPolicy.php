<?php

namespace App\Entitlements\Application\Policies;

use App\User\Infrastructure\Models\User;
use App\Entitlements\Infrastructure\Models\Ppv;
use Illuminate\Auth\Access\HandlesAuthorization;

class PpvPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the ppv.
     *
     * @param  \App\User\Infrastructure\Models\User\Infrastructure\Models\User  $user
     * @param  \App\Ppv  $ppv
     * @return mixed
     */
    public function show(User $user, Ppv $ppv)
    {
        return (bool)$ppv->users()->find($user->id);
    }

    /**
     * Determine whether the user can create ppvs.
     *
     * @param  \App\User\Infrastructure\Models\User\Infrastructure\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the ppv.
     *
     * @param  \App\User\Infrastructure\Models\User\Infrastructure\Models\User  $user
     * @param  \App\Ppv  $ppv
     * @return mixed
     */
    public function update(User $user, Ppv $ppv)
    {
        //
    }

    /**
     * Determine whether the user can delete the ppv.
     *
     * @param  \App\User\Infrastructure\Models\User\Infrastructure\Models\User  $user
     * @param  \App\Ppv  $ppv
     * @return mixed
     */
    public function delete(User $user, Ppv $ppv)
    {
        //
    }

    /**
     * Determine whether the user can restore the ppv.
     *
     * @param  \App\User\Infrastructure\Models\User\Infrastructure\Models\User  $user
     * @param  \App\Ppv  $ppv
     * @return mixed
     */
    public function restore(User $user, Ppv $ppv)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the ppv.
     *
     * @param  \App\User\Infrastructure\Models\User\Infrastructure\Models\User  $user
     * @param  \App\Ppv  $ppv
     * @return mixed
     */
    public function forceDelete(User $user, Ppv $ppv)
    {
        //
    }
}
