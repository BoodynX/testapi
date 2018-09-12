<?php

namespace App\Entitlements\Api\Controllers;

use App\Entitlements\Api\Resources\PpvResource;
use App\Entitlements\Api\Resources\PpvsResource;
use App\Entitlements\Infrastructure\Models\Ppv;
use App\Framework\Http\Controllers\Controller;
use App\User\Api\Resources\UserResource;
use App\User\Domain\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function show(Ppv $ppv)
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

    public function users(Ppv $ppv, UserRepository $userRepository): UserResource
    {
        UserResource::withoutWrapping();

        return new UserResource($userRepository->findById(Auth::id()));
    }
}
