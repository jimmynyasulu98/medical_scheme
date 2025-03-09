<?php

namespace Database\Factories;

use App\Models\ServiceProvider;
use Database\Factories\Helpers\FactoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           
            'service_provider_id' => FactoryHelper::getRandomModelId(ServiceProvider::class),
            'number' =>  fake()->numberBetween($min = 200000, $max = 500000 ),
            'date' =>  fake()->date(),
            'date_recieved' =>  fake()->date(),
            'date_paid' =>  fake()->date(),
            'total' =>  fake()->numberBetween($min = 200000, $max = 500000 ),
        ];
    }
}
