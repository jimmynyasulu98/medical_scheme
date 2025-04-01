<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use function Laravel\Prompts\error;
use App\Http\Resources\RoleResource;

use App\Exceptions\GeneralJsonException;
use App\Http\Requests\Role\StoreRoleRequest;
use Illuminate\Http\JsonResponse;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::whereNotIn('name', ['admin', 'role B'])->where("deleted", '=', false)->get();
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
    public function update(StoreRoleRequest $request , Role $role)
    {
        $updated = $role->update([
            'name' => $request->name ?? $role->name, 
        ]);

        $role->syncPermissions($request->permissions);
     
         throw_if(!$updated,GeneralJsonException::class, 'record not updated');
     
         return new RoleResource($role);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
       
        $deleted = $role->update([
            'deleted' => true 
        ]);
        throw_if(!$deleted,GeneralJsonException::class, 'action not completed' );

        return new JsonResponse([
            'data' => 'success'
        ],200);

    }
}
