<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expenditure>
 */
class ExpenditureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount'       =>fake()->numberBetween(100,10000),
            'description'   =>fake()->unique()->randomElement(['others', 'food','electricity bill', 'water bill', 'utilities','transportation','liabilities']),
            'date'          =>fake()->unique()->dateTimeThisMonth()
        ];
    }
}
