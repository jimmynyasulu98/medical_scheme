<?php

namespace App\Http\Controllers;

use App\Models\Cover;
use App\Http\Requests\StoreCoverRequest;
use App\Http\Requests\UpdateCoverRequest;

class CoverController extends Controller
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
    public function store(StoreCoverRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cover $cover)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCoverRequest $request, Cover $cover)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cover $cover)
    {
        //
    }
}
