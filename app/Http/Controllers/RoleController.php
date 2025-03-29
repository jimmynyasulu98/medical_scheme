<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use function Laravel\Prompts\error;
use App\Http\Resources\RoleResource;

use App\Exceptions\GeneralJsonException;
use App\Http\Requests\Role\StoreRoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return RoleResource::collection($roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $role = Role::create(
            [ 
                'name' => $request->name,
            ]
        );

        $role->syncPermissions($request->permissions);
            
       /*  if(!$created){
            throw new GeneralJsonException('record not created', 422);
        } */
        throw_if(!$role,GeneralJsonException::class, 'record not created');
    
        return new RoleResource($role);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
