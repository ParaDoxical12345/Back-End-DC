<?php

namespace App\Http\Controllers;

use App\Models\Liability;
use Illuminate\Http\Request;

class LiabilityController extends Controller
{
    public function index(){
        $liabilities = Liability::orderBy('id')->get();
        return response()->json($liabilities);
    }

    public function store(Request $request){
        $fields = $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'expenditure_id' => 'nullable'
        ]);


        $liability = Liability::create($fields);

        return response()->json([
            'status' => 'OK',
            'Monthly liability' => $liability,
            'message' => 'liability has been added to the savings '. $liability->date
        ]);
    }


    public function update(Request $request, Liability $liability){
        $fields = $request->validate([
            'amount' => 'numeric',
            'expenditure_id' => 'numeric',
        ]);

        $fields['amount'] = $liability['amount'] - $fields['amount'];

        $liability->update($fields);

        return response()->json([
            'status' => 'OK',
            'message' => 'Liability with ID# ' . $liability->id. 'has been updated.'
        ]);
    }
}
