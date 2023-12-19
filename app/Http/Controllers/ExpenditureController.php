<?php

namespace App\Http\Controllers;

use App\Models\Expenditure;
use App\Models\Bill;
use App\Models\RecordOfSaving;
use Illuminate\Http\Request;

class ExpenditureController extends Controller
{
    public function index(){
        $expenditures = Expenditure::orderBy('id')->get();
        return response()->json($expenditures);
    }

    public function store(Request $request){
        $fields = $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        $expenditure = Expenditure::create($fields);

        return response()->json([
            'status' => 'OK',
            'Monthly expenditure' => $expenditure,
            'message' => 'expenditure has been added to the savings '. $expenditure->date
        ]);
    }
}
