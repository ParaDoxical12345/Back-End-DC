<?php

namespace Database\Seeders;

use App\Models\Bill;
use App\Models\Expenditure;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bill::insert([
            [
                'amount'            =>fake()->numberBetween(1000,10000),
                'description'       =>'electricity bill',
                'due_date'          =>'2023-8-9'
            ],
            [
                'amount'            =>fake()->numberBetween(1000,10000),
                'description'       =>'water bill',
                'due_date'          =>'2023-8-9'
            ],
            [
                'amount'            =>fake()->numberBetween(1000,10000),
                'description'       =>'utilities',
                'due_date'          =>'2023-8-9'
            ]
        ]);
    }
}
