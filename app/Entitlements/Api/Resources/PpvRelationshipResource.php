<?php

namespace App\Entitlements\Api\Resources;

use App\User\Api\Resources\UserIdentifierResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PpvRelationshipResource extends JsonResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'users'   => [
                'links' => [
                    'self'    => route('ppvs.relationships.user', ['user' => $this->id]),
                    'related' => route('ppvs.user', ['user' => $this->id]),
                ],
                'data'  => new UserIdentifierResource($this->user),
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
