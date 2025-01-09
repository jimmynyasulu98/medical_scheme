<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\ClaimResource;
use App\Exceptions\GeneralJsonException;
use App\Http\Requests\Claim\StoreClaimRequest;
use App\Http\Requests\Claim\UpdateClaimRequest;

class ClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClaimRequest $request)
    {
        $created = Claim::query()->create([
            'user_id' =>  $request->user_id,
            'invoice_id' =>  $request->invoice_id,
            ]);
            
       /*  if(!$created){
            throw new GeneralJsonException('record not created', 422);
        } */
        throw_if(!$created,GeneralJsonException::class, 'record not created' );
    
        return new ClaimResource($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(Claim $claim)
    {
        return new claimResource($claim);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClaimRequest $request, Claim $claim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Claim $claim)
    {
        $deleted = $claim->delete();
   
        #$user->restore();
        #$user->trashed()
        throw_if(!$deleted,GeneralJsonException::class, 'could not delete record' );

        return new JsonResponse([
            'data' => 'success'
        ]);
    }
}
