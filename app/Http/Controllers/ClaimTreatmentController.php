<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\ClaimTreatment;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralJsonException;
use App\Http\Resources\ClaimTreatmentResource;
use App\Http\Requests\Claim\StoreClaimTreatmentRequest;
use App\Http\Requests\Claim\UpdateClaimTreatmentRequest;


class ClaimTreatmentController extends Controller
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
    public function store(StoreClaimTreatmentRequest $request)
    {
        $createdRecord = DB::transaction( function () use($request){
            $createdRecord = ClaimTreatment::query()->create([
                'claim_id' =>  $request->claim_id,
                'treatment_type' =>  $request->treatment_type,
                'description' =>  $request->description,
                'charge' =>  $request->charge,
                ]);
    
            throw_if(!$createdRecord,GeneralJsonException::class, 'record not created' );
            #update claim and invoice amount
            DB::table('claims')->where('id', $request->claim_id)->increment('sub_total', $request->charge);
            return $createdRecord;

        });    
        return new ClaimTreatmentResource($createdRecord);
    }

    /**
     * Display the specified resource.
     */
    public function show(ClaimTreatment $claimTreatment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClaimTreatmentRequest $request, ClaimTreatment $claimTreatment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClaimTreatment $claimTreatment)
    {
        $deleted = $claimTreatment->delete();
        throw_if(!$deleted,GeneralJsonException::class, 'could not delete record' );

        return new JsonResponse([
            'data' => $claimTreatment
        ]);

    }
}
