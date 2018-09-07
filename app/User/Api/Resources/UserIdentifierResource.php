<?php

namespace App\User\Api\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserIdentifierResource extends JsonResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'type'       => 'user',
            'id'         => (string)$this->id,
        ];
    }
}
