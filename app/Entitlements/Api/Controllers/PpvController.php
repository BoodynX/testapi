<?php

namespace App\Entitlements\Api\Controllers;

use App\Entitlements\Api\Resources\PpvResource;
use App\Entitlements\Api\Resources\PpvsResource;
use App\Entitlements\Infrastructure\Models\Ppv;
use App\Framework\Http\Controllers\Controller;
use App\User\Api\Resources\UserResource;
use App\User\Infrastructure\Models\User;
use Illuminate\Http\Request;

class PpvController extends Controller
{
    public function index(): PpvsResource
    {
        return new PpvsResource(Ppv::with(['users'])->paginate());
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Ppv $ppv): PpvResource
    {
        PpvResource::withoutWrapping();

        return new PpvResource($ppv);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    /*
     * Relationships
     */

    public function users(User $user)
    {
        return new UserResource($user);
    }
}
