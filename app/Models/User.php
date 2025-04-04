<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Dependant;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable ,SoftDeletes;
    use HasRoles;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'membership_number',
        'is_principal_member'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function principal_member(): HasOne
    {
        return $this->hasOne(Dependant::class,'dependant_id');
    }


    public function dependants() 
    {
        return $this->hasMany(Dependant::class, 'principal_member_id' );
        
    }

    public function dependants_to_json() 
    {

        $jsonCollection = collect([]);

        foreach ( $this->dependants as $dependant)
        {
            if ($dependant->dependant){
                $jsonCollection->add($dependant->dependant);
            
            }
           
        }

        return $jsonCollection;
        
    }

    public static function deleteDependents($model){

        User::whereIn('id',$model->dependants->pluck('dependant_id')->toArray() )->delete();
    }



}
