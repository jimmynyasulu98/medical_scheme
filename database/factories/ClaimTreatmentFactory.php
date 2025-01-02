<?php

namespace Database\Factories;

use App\Models\Claim;
use Database\Factories\Helpers\FactoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClaimTreatment>
 */
class ClaimTreatmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'claim_id' => FactoryHelper::getRandomModelId(Claim::class),
            'charge' =>  fake()->numberBetween($min = 5000, $max = 10000),
        ];
    }
}
