<?php

namespace App\Http\Controllers;

use App\Models\LoanTransaction;
use App\Models\Loan;
use App\Models\customers; // Using your plural model name from Activity 11/12
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LoanTransactionController extends Controller
{
    /**
     * Task 5: Implement Search Module
     */
    public function index(Request $request)
    {
        $search = $request->search;

        // Eager load 'customer' and 'loan' to display their names/descriptions in the table
        $transactions = LoanTransaction::with(['customer', 'loan'])
            ->when($search, function($query) use ($search) {
                // Search filter targeting the 'name' column in the related 'customers' table
                $query->whereHas('customer', function($q) use ($search) {
                    $q->where('name', 'like', "%$search%");
                });
            })
            ->paginate(10); // Added pagination for better data management

        return view('loantransactions.index', compact('transactions'));
    }

    /**
     * Task 4: Create View with Dropdowns
     */
    public function create()
    {
        // Fetch all records from master tables to populate select options
        $customers = customers::all();
        $loans = Loan::all();
        
        return view('loantransactions.create', compact('customers', 'loans'));
    }

    /**
     * Task 3: Implement Store Logic
     */
    public function store(Request $request)
    {
        $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'customer_id' => 'required|exists:customers,id',
            'amount_paid' => 'required|numeric',
            'date_paid' => 'required|date',
        ]);

        LoanTransaction::create($request->all());

        return redirect()->route('loantransactions.index')->with('success', 'Transaction Recorded!');
    }

    /**
     * Task 6: PDF Generation Module
     */
    public function generatePDF()
    {
        // Retrieve all transactions with related master data
        $transactions = LoanTransaction::with(['customer', 'loan'])->get();

        $pdf = Pdf::loadView('loantransactions.pdf', compact('transactions'));

        return $pdf->download('Loan_Transactions_Report.pdf');
    }

    // CRUD: Edit
    public function edit($id)
    {
        $transaction = LoanTransaction::findOrFail($id);
        $customers = customers::all();
        $loans = Loan::all();
        return view('loantransactions.edit', compact('transaction', 'customers', 'loans'));
    }

    // CRUD: Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'loan_id' => 'required',
            'customer_id' => 'required',
            'amount_paid' => 'required|numeric',
            'date_paid' => 'required|date',
        ]);

        $transaction = LoanTransaction::findOrFail($id);
        $transaction->update($request->all());

        return redirect()->route('loantransactions.index')->with('success', 'Transaction Updated!');
    }

    // CRUD: Destroy
    public function destroy($id)
    {
        LoanTransaction::findOrFail($id)->delete();
        return redirect()->route('loantransactions.index')->with('success', 'Transaction Deleted!');
    }
}