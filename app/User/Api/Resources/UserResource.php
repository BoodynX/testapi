<?php

namespace App\User\Api\Resources;

use App\User\Domain\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var User $user */
        $user = $this->resource;

        return [
            'type'          => 'users',
            'id'            => (string)$user->getId(),
            'attributes'    => [
                'name' => $user->getName(),
                'email' => $user->getEmail()->getFullAddress(),
            ],
//            @TODO
//            'relationships' => new UserRelationshipResource($this),
            'links'         => [
                'self' => route('user.show', ['user' => $user->getId()]),
            ],
        ];
    }
}
