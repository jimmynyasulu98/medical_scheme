<?php

namespace Database\Factories;

use App\Models\Cover;
use App\Models\Location;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Database\Factories\Helpers\FactoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $university_id = rand(1,6);
        $serial_number = rand(10101,50120);
        $member_id = rand(1,6);

        return [
            'membership_number' => "{$university_id}-0118-{$serial_number}-{$member_id}",
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'gender' => 'male',
            'marital_status' => 'never married',
            'payroll_number' => '1045',
            'date_of_birth' => fake()->date() ,
            'phone_number_1' => '088238832',
            'phone_number_2' => '088235723',
            'nationality' => 'Malawian',
            'date_joined' => fake()->date() ,
            'date_of_application' => fake()->date() ,
            'email' => fake()->unique()->safeEmail(),
            'is_principal_member' =>  rand(0,1),
            'location_id' => FactoryHelper::getRandomModelId(Location::class),
            'cover_id' => FactoryHelper::getRandomModelId(Cover::class),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
