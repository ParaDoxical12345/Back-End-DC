<?php

namespace Database\Seeders;

use App\Models\MonthlyIncome;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MonthlyIncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MonthlyIncome::insert([[
                'amount'    =>fake()->numberBetween(30000,40000),
                'date'      =>'2023-04-30',
            ],
            [
                'amount'    =>fake()->numberBetween(30000,40000),
                'date'      =>'2023-05-30',
            ],
            [
                'amount'    =>fake()->numberBetween(30000,40000),
                'date'      =>'2023-06-30',
            ],
            [
                'amount'    =>fake()->numberBetween(30000,40000),
                'date'      =>'2023-07-30',
            ]]
        );
    }
}
