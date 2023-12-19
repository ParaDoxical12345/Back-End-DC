<?php

namespace Database\Factories;

use App\Models\Expenditure;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Liability>
 */
class LiabilityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount'            =>fake()->numberBetween(1000,100000),
            'description'       =>fake()->randomElement(['Loan', 'Pag-ibig loan', 'Motorcycle payment']),
            'due_date'          =>fake()->unique()->dateTimeThisMonth(),
            'start_date'        =>fake()->date(),
            'end_date'          =>fake()->date(),
            'expenditure_id'    =>fake()->randomElement(Expenditure::where('description', 'liabilities')->pluck('id'))
        ];
    }
}
