<?php

use App\Http\Controllers\ExpenseController;
use App\Models\Expense;
use App\Models\split_expense;
use App\Models\SplitExpense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  $splitExpenses = SplitExpense::all();  // Example: Fetch all SplitExpense records

  return view('welcome', [
    'expenses' => Expense::all(),
    'splitExpenses' => $splitExpenses 
]);
});

// GROUP
// In routes/web.php or other route files
Route::get('/create', [ExpenseController::class, 'displayCreateForm'])->name('expenses.create');

Route::get('/edit/{id}',function($id){
  $data = Expense::find($id);
   return view('/edit',['data' => $data]);
});


Route::post('/submit-form', 
function (Request $req) {
  // form bata data lyawo
  $title = $req->title;
  $amount = $req->amount;
  $category = $req->category;

  $exp = new Expense();
  $exp->title = $title;
  $exp->amount = $amount;
  $exp->category = $category;
  //POST REQUEST
  $exp->save();

  return redirect('/');
});


Route::post('/update/{id}', 
function ($id,Request $req) {

  $data = Expense::find($id);
  $data -> title = $req -> title;
  $data -> amount = $req -> amount;
  $data -> category = $req -> category;
  $data -> update();
    
  return redirect('/');
});

Route::get('/delete/{id}',function($id,Request $req){
  $data = Expense::find($id);
  $data -> delete();
  

  return redirect('/');
  
  
});


Route::post('/split/{id}', [ExpenseController::class, 'calculateSplit'])->name('expenses.split');

Route::post('/submit-split', 
function (Request $req) {
  
  $person_name = $req->person_name;
  $totalPeople = $req->totalPeople;
  $amount = $req->amount;
  $split_amount = $amount/$totalPeople;
 

  $exp = new SplitExpense();
  
  $exp->person_name = $person_name;
  $exp->split_amount = $split_amount;
  
  
  //POST REQUEST
  $exp->save();

  return redirect('/');
});
