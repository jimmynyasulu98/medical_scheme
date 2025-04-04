<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Exceptions\GeneralJsonException;
use App\Http\Resources\EmployeeResource;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = User::where("is_employee", '=', true)->get();
        return EmployeeResource::collection($employees);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    
    /**
     * Display the specified resource.
     * @param \App\Models\User $user
     * @return EmployeeResource
     */
    public function show(User $employee)
    {
       
        return new EmployeeResource($employee);
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

    public function assign_role(Request $request, User $employee ) 
    { 
        $assigned = $employee->assignRole( [ $request->name]);

        throw_if(!$assigned,GeneralJsonException::class, 'record not created');
        return new JsonResponse([
            'data' => 'success'
        ], 200);

    }

    public function unassign_role(Request $request, User $employee ) 
    { 
        $assigned = $employee->removeRole( preg_replace('/\s+/', '', $request->name )) ;

        throw_if(!$assigned,GeneralJsonException::class, 'action failed');
        return new JsonResponse([
            'data' => 'success'
        ], 200);

    }

    public function assign_permission(Request $request, User $employee ) 
    { 
        $assigned = $employee->givePermissionTo( [ $request->name]);

        throw_if(!$assigned,GeneralJsonException::class, 'record not created');
        return new JsonResponse([
            'data' => 'success'
        ], 200);

    }

    public function unassign_permission(Request $request, User $employee ) 
    { 
        $assigned = $employee->revokePermissionTo( preg_replace('/\s+/', '', $request->name )) ;

        throw_if(!$assigned,GeneralJsonException::class, 'action failed');
        return new JsonResponse([
            'data' => 'success'
        ], 200);

    }
}
