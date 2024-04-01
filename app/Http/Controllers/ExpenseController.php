<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{


    public function displayCreateForm()
    {
        return view('create');
    }


    public function calculateSplit($id)
    {
        $data = Expense::find($id);
        return view('split', [
            'data' => $data,
            
        ]);
        // $data = Expense::find($id);
        // $totalPeople = $request->totalPeople ?? 0; // Set initial value to zero if not submitted
    
        // if ($data) {
        //     // Expense record exists, proceed with the calculation
        //     $splitAmount = $totalPeople ? $data['amount'] / $totalPeople : 0;
        // } else {
        //     // Expense record not found, handle accordingly (e.g., redirect or show an error message)
        //     // For now, let's set the splitAmount to zero
        //     $splitAmount = 0;
        // }
    
        // return view('split', [
        //     'data' => $data,
        //     'totalPeople' => $totalPeople,
        //     'splitAmount' => $splitAmount,
        // ]);
    }


   
    
    
    
    
    
}