<?php
namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function displayCreateForm()  
    {
        return view('create');  // Display form in 'create' view
    }

    public function submitForm(Request $request) 
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'amount' => 'required|numeric',
            'category' => 'required'
        ]);

        $exp = new Expense($validatedData); 
        $exp->save();

        return redirect('/')->with('success', 'Expense created successfully!');
    }
}
?>