<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'membership_number' => "{$university_id}-0118-{$serial_number}-{$member_id}",
            'email' => fake()->unique()->safeEmail(),
            'is_principal_member' =>  rand(0,1),
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
