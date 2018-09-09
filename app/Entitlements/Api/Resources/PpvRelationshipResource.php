<?php

namespace App\Entitlements\Api\Resources;

use App\User\Api\Resources\UserIdentifierResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class PpvRelationshipResource extends JsonResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $user = $this->resource->resource->users->find(Auth::id());

        if (!$user){
            return [];
        }

        return [
            'users'   => [
                'links' => [
                    'self'    => route('ppvs.relationships.user', ['user' => $user->id]),
                    'related' => route('ppvs.user', ['user' => $user->id]),
                ],
                'data'  => new UserIdentifierResource($user),
            ],
        ];
    }
    public function with($request)
    {
        return [
            'links' => [
                'self' => route('ppvs.index'),
            ],
        ];
    }
}
