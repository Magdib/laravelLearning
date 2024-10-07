<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customers>
 */
class CustomersFactory extends Factory
{

    public function definition(): array
    {
        return [
            'company_id'=>Company::factory()->create(),
            'name' =>fake()->name(),
            'email' =>fake()->unique()->safeEmail(),
            'active'=>1
        ];
    }
}
