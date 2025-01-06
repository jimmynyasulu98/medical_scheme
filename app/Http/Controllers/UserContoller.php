<?php

namespace App\Http\Controllers;

use App\Exceptions\GeneralJsonException;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserContoller extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return ResourceCollection
     */
    public function index(Request $request)
    {
        
        $pageSize = $request->page_size ?? 20;
        $users = User::query()->paginate($pageSize);
        return UserResource::collection($users);
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
            
       /*  if(!$created){
            throw new GeneralJsonException('record not created', 422);
        } */

        throw_if(!$created,GeneralJsonException::class, 'record not created' );
    
        return new UserResource($created);
    }

    /**
     * Display the specified resource.
     * @param \App\Models\User $user
     * @return UserResource
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

   
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param \App\Models\User $user
     * @return JsonResponse | UserResource
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

        /* if(!$updated){
            throw new GeneralJsonException('record not update record', 422);
        }
       */
        throw_if(!$updated,GeneralJsonException::class, 'record not created' );
        
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $deleted = $user->delete();

        #$user->restore();
        #$user->trashed()
        throw_if(!$deleted,GeneralJsonException::class, 'could not delete record' );

        User::deleteDependents($user);

        return new JsonResponse([
            'data' => 'success'
        ]);
       
    }
}
