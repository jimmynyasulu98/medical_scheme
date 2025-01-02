<?php

namespace Database\Factories;

use App\Models\Dependant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dependant>
 */
class DependantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {
      
        $principal_members = User::get()->where('is_principal_member', true)->pluck('id')->toArray();

        $member_dependant = Dependant::pluck('dependant_id')->toArray();

        $dependants = User::get()->where('is_principal_member', false)->whereNotIn('id', $member_dependant)->pluck('id')->toArray();

       
        return [
            'principal_member_id' => $principal_members[array_rand($principal_members)],
            'dependant_id' => $dependants[0],
        ];
    }
}
