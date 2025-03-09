<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\InvoiceResource;
use App\Exceptions\GeneralJsonException;
use App\Http\Requests\Invoice\StoreInvoiceRequest;
use App\Http\Requests\Invoice\UpdateInvoiceRequest;
use Illuminate\Http\Resources\Json\ResourceCollection;



class InvoiceController extends Controller
{
      /**
     * Display a listing of the resource.
     * 
     * @return ResourceCollection
     */
    public function index()
    {
        //$pageSize = $request->page_size ?? 20;
        $invoices = Invoice::all();//query()->paginate($pageSize);
        return InvoiceResource::collection($invoices);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request)
    {
        $created = Invoice::query()->create([
            'service_provider_id' => $request->service_provider_id,
            ]);
            
       /*  if(!$created){
            throw new GeneralJsonException('record not created', 422);
        } */
        throw_if(!$created,GeneralJsonException::class, 'record not created' );
    
        return new InvoiceResource($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        return new invoiceResource($invoice);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        $deleted = $invoice->delete();
        #$user->restore();
        #$user->trashed()
        throw_if(!$deleted,GeneralJsonException::class, 'could not delete record' );

        return new JsonResponse([
            'data' => 'success'
        ]);

    }
}
