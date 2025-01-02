<?php

namespace Database\Factories;

use App\Models\ServiceProvider;
use App\Models\User;
use Database\Factories\Helpers\FactoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Claim>
 */
class ClaimFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => FactoryHelper::getRandomModelId(User::class),
            'service_provider_id' => FactoryHelper::getRandomModelId(ServiceProvider::class),
            'sub_total' =>  fake()->numberBetween($min = 20000, $max = 30000),
        ];
    }
}
