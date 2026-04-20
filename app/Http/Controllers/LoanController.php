<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::all();
        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        return view('loans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'amount' => 'required|numeric',
            'term' => 'required|integer',
            'interest' => 'required|numeric',
            'dategranted' => 'required|date',
        ]);

        Loan::create($request->all());
        return redirect()->route('loans.index')->with('success', 'Loan Type Added!');
    }

    // You can keep edit/update/destroy empty or implement them later
    public function edit($id) { $loan = Loan::findOrFail($id); return view('loans.edit', compact('loan')); }
    public function update(Request $request, $id) { /* Update logic */ }
    public function destroy($id) { Loan::findOrFail($id)->delete(); return redirect()->route('loans.index'); }
}