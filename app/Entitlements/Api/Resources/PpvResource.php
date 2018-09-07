<?php

namespace App\Entitlements\Api\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PpvResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type'          => 'ppvs',
            'id'            => (string)$this->id,
            'attributes'    => [
                'name' => $this->name,
            ],
            'relationships' => new PpvRelationshipResource($this),
            'links'         => [
                'self' => route('ppvs.show', ['ppv' => $this->id]),
            ],
        ];
    }
}
