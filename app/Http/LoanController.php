<?php
namespace App\Http\Controllers;
use App\Models\Loan;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class LoanController extends Controller {
    public function index() {
    return view('loans.index', ['loans' => Loan::with(['book','user'])->get()]);
    }
    public function create() {
        return view('loans.create', [
        'books' => Book::all(),
        'users' => User::all()
        ]);
    }


    public function store(Request $request) {
    $request->validate([
    'book_id' => 'required',
    'user_id' => 'required',
    'loan_date' => 'required'
    ]);


Loan::create($request->all());
return redirect()->route('loans.index');
}


    public function edit(Loan $loan) {
        return view('loans.edit', [
        'loan' => $loan,
        'books' => Book::all(),
        'users' => User::all()
        ]);
    }


    public function update(Request $request, Loan $loan) {
    $loan->update($request->all());
    return redirect()->route('loans.index');
    }


    public function destroy(Loan $loan) {
    $loan->delete();
    return redirect()->route('loans.index');
    }

}