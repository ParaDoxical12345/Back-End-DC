<?php

namespace Database\Seeders;

use App\Models\RecordOfSaving;
use App\Models\MonthlyIncome;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecordOfSavingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RecordOfSaving::insert([
            [
                'total_amount'  =>fake()->randomElement(MonthlyIncome::where('id', 1)->pluck('amount')) ,
                'date'          =>'2023-04-30',
                'deposit'       =>fake()->randomElement(MonthlyIncome::where('id', 1)->pluck('id'))
            ],
            [
                'total_amount'  =>fake()->randomElement(MonthlyIncome::where('id', 2)->pluck('amount')) + RecordOfSaving::sum('total_amount'),
                'date'          =>'2023-05-30',
                'deposit'       =>fake()->randomElement(MonthlyIncome::where('id', 2)->pluck('id'))
            ],
            [
                'total_amount'  =>fake()->randomElement(MonthlyIncome::where('id', 3)->pluck('amount')) + RecordOfSaving::sum('total_amount'),
                'date'          =>'2023-06-30',
                'deposit'       =>fake()->randomElement(MonthlyIncome::where('id', 3)->pluck('id'))
            ],
            [
                'total_amount'  =>fake()->randomElement(MonthlyIncome::where('id', 4)->pluck('amount')) + RecordOfSaving::sum('total_amount'),
                'date'          =>'2023-07-30',
                'deposit'       =>fake()->randomElement(MonthlyIncome::where('id', 4)->pluck('id'))
            ],
            ]);
    }
}
