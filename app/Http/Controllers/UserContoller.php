<?php

namespace App\Http\Controllers;

use App\Exceptions\GeneralJsonException;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserWithDependantsResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Hash;

class UserContoller extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return ResourceCollection
     */
    public function index(Request $request)
    {
        
        //$pageSize = $request->page_size ?? 20;
        $users = User::all();//query()->paginate($pageSize);
        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     * @param  StoreUserRequest $request
     */
    public function store(StoreUserRequest $request)
    {

        #error_log($request->first_name);
        $created = User::query()->create([

            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make('password'),
            'membership_number' => $request-> membership_number,
            'is_principal_member' => true

            ]);

        throw_if(!$created,GeneralJsonException::class, 'record not created' );
    
        return new UserResource($created);
   
    }

    /**
     * Display the specified resource.
     * @param \App\Models\User $user
     * @return UserWithDependantsResource
     */
    public function show(User $user)
    {
        return new UserWithDependantsResource($user);
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
