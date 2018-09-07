<?php

namespace App\User\Api\Controllers;

use App\Framework\Http\Controllers\Controller;
use App\User\Api\Resources\UserResource;
use App\User\Domain\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(Request $request)
    {
        //
    }

    public function show(UserRepository $userRepository): UserResource
    {
        UserResource::withoutWrapping();

        return new UserResource($userRepository->findById(Auth::id()));
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

    public function users()
    {
        
    }
}
