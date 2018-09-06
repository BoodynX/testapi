<?php

namespace App\Entitlements\Api\Controllers;

use App\Core\Infrastructure\Models\Ppv;
use App\Entitlements\Api\Resources\PpvResource;
use App\Entitlements\Api\Resources\PpvsResource;
use App\Framework\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PpvController extends Controller
{
    public function index(): PpvsResource
    {
        return new PpvsResource(Ppv::with(['users'])->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show(Ppv $ppv): PpvResource
    {
        PpvResource::withoutWrapping();

        return new PpvResource($ppv);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
