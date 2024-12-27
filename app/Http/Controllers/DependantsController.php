<?php

namespace App\Http\Controllers;

use App\Models\Dependants;
use App\Http\Requests\StoreDependantsRequest;
use App\Http\Requests\UpdateDependantsRequest;

class DependantsController extends Controller
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
    public function store(StoreDependantsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dependants $dependants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDependantsRequest $request, Dependants $dependants)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dependants $dependants)
    {
        //
    }
}
