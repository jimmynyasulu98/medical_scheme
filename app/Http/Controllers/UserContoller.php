<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserContoller extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index()
    {
        $users = User::query()->get();
        return new JsonResponse([
            'data' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     */
    public function store(Request $request)
    {
        $created = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'membership_number' => $request-> membership_number,
            'is_principal_member' => $request->is_principal_member
            ]);
    
            return new JsonResponse([
                'data' => $created
            ]);
    }

    /**
     * Display the specified resource.
     * @param User $user
     * @return UserResource
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

   
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $updated = $user->update([
            'name' => $request->name ?? $user->name,
            'email' => $request->email ?? $user->email,
            'password' => $request->password ?? $user->password,
            'membership_number' => $request-> membership_number ?? $user->membership_number,
            'is_principal_member' => $request->is_principal_member ?? $user->is_principal_member
        ]);

        if(!$updated){

            return new JsonResponse([
                'errors' =>  [
                    'could not update record'
                ]
            ], 400);
        }

        return new JsonResponse([
            'data' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $deleted = $user->forceDelete();

        if(!$deleted){

            return new JsonResponse([
                'errors' =>  [
                    'could not delete record'
                ]
            ], 400);
        }

        return new JsonResponse([
            'data' => 'success'
        ]);
       
    }
}
