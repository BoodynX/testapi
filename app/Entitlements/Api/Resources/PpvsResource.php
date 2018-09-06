<?php

namespace App\Entitlements\Api\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PpvsResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => PpvResource::collection($this->collection),
        ];
    }

    public function with($request)
    {
        return [
            'links'    => [
                'self' => route('ppvs.index'),
            ],
        ];
    }
}
