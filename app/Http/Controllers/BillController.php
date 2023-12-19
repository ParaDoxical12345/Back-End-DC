<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index(){
        $bills = Bill::orderBy('id')->get();
        return response()->json($bills);
    }

    public function store(Request $request){
        $fields = $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'expenditure_id' => 'nullable|exists:expenditures,id'
        ]);


        $bill = Bill::create($fields);

        return response()->json([
            'status' => 'OK',
            'Monthly bill' => $bill,
            'message' => 'bill has been added to the savings '. $bill->date
        ]);
    }

    public function update(Request $request, Bill $bill){
        $fields = $request->validate([
            'amount' => 'numeric',
            'expenditure_id' => 'numeric',
        ]);

        $bill->update($fields);

        return response()->json([
            'status' => 'OK',
            'message' => 'Bill with ID# ' . $bill->id. 'has been updated.'
        ]);
    }
}
