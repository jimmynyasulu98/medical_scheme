<?php

namespace App\Http\Controllers;

use App\Models\ServiceProvider;
use App\Http\Requests\StoreServiceProviderRequest;
use App\Http\Requests\UpdateServiceProviderRequest;
use App\Http\Resources\ServiceProviderResource;

class ServiceProviderController extends Controller
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
    public function store(StoreServiceProviderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceProvider $serviceProvider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceProviderRequest $request, ServiceProvider $serviceProvider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceProvider $serviceProvider)
    {
        //
    }

    public function search()
    {
        $searchQuery = request('query');
        if($searchQuery){
            
            $serviveProviders = ServiceProvider::where('title', 'like', "%{$searchQuery}%")->get();
            return ServiceProviderResource::collection($serviveProviders);
        };
        
    }
}
