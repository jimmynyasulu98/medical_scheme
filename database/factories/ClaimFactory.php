<?php

namespace Database\Factories;

use App\Models\Invoice;
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
            'number' =>  fake()->numberBetween($min = 20000, $max = 30000),
            'user_id' => FactoryHelper::getRandomModelId(User::class),
            'invoice_id' => FactoryHelper::getRandomModelId(Invoice::class),
            'sub_total' =>  fake()->numberBetween($min = 20000, $max = 30000),
        ];
    }
}
