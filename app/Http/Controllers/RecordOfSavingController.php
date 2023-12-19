<?php

namespace App\Http\Controllers;

use App\Models\RecordOfSaving;
use Illuminate\Http\Request;

class RecordOfSavingController extends Controller
{
    public function index(){
        $savings = RecordOfSaving::latest('id')->first();
        return response()->json($savings);
    }

    public function view(){
        $savings = RecordOfSaving::orderBy('date')->get();
        return response()->json($savings);
    }

    public function second(){
        $second = RecordOfSaving::latest('id')->skip(1)->first();
        return response()->json($second);
    }

    public function store(Request $request){

        $lastincome = RecordOfSaving::latest('id')->first();

        $fields = $request->validate([
            'total_amount' => 'required|numeric',
            'date' => 'required|date',
            'deposit' => 'required|exists:monthly_incomes,id',
        ]);

        $fields['total_amount'] += $lastincome->total_amount;
        $saving = RecordOfSaving::create($fields);


        return response()->json([
            'status' => 'OK',
            'Monthly Income' => $saving,
            'message' => 'Income has been added to the savings '. $saving->date
        ]);
    }

    public function update(Request $request){

        $saving = RecordOfSaving::latest('id')->first();

        $fields = $request->validate([
            'total_amount' => 'numeric',
            'date' => 'date',
        ]);

        $fields['total_amount'] += $saving->total_amount;
        $saving->update($fields);

        return response()->json([
            'status' => 'OK',
            'message' => 'Saving with ID# ' . $saving->id. 'has been updated.'
        ]);
    }

    public function pay(Request $request){

        $saving = RecordOfSaving::latest('id')->first();

        $fields = $request->validate([
            'total_amount' => 'numeric',
            'date' => 'date',
        ]);

        $fields['total_amount'] = $saving->total_amount - $fields['total_amount'];
        $saving->update($fields);

        return response()->json([
            'status' => 'OK',
            'message' => 'Saving with ID# ' . $saving->id. 'has been updated.'
        ]);
    }
}
