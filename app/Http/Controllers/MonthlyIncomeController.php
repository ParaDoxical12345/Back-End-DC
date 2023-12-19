<?php

namespace App\Http\Controllers;

use App\Models\MonthlyIncome;
use Illuminate\Http\Request;

class MonthlyIncomeController extends Controller
{
    public function store(Request $request){
        $fields = $request->validate([
            'amount' => 'required|numeric',
            'date' => 'required|date'
        ]);


        $income = MonthlyIncome::create($fields);

        return response()->json([
            'status' => 'OK',
            'Monthly Income' => $income,
            'message' => 'Income has been added to the savings '. $income->date
        ]);
    }
}
