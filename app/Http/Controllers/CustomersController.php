<?php

namespace App\Http\Controllers;

use App\Models\customers;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // 👈 Add this for PDF generation

class CustomersController extends Controller
{
    // UPDATED: Added Request $request to handle search input
    public function index(Request $request) 
    {
        $search = $request->input('search');

        // Logic for Search and Pagination (5 records per page)
        $customers = customers::when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                        ->orWhere('address', 'like', "%{$search}%");
            })
            ->paginate(5) // 👈 Pagination
            ->withQueryString(); // 👈 Keeps search terms in pagination links

        return view('customers.index', compact('customers'));
    }

    // NEW: Method for PDF Generation
    public function exportPdf()
    {
        $customers = customers::all();
        $pdf = Pdf::loadView('customers.pdf', compact('customers'));
        return $pdf->download('customer-report.pdf');
    }

    /* --- Keep your existing create, store, edit, update, and destroy methods below --- */

    public function create() {
        return view('customers.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
        ]);
        customers::create($request->all());
        return redirect()->route('customers.index')->with('success', 'Customer Added!');
    }

    public function edit($id) {
        $customer = customers::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
        ]);
        $customer = customers::findOrFail($id);
        $customer->update($request->all());
        return redirect()->route('customers.index')->with('success', 'Customer Updated!');
    }

    public function destroy($id) {
        customers::findOrFail($id)->delete();
        return redirect()->route('customers.index')->with('success', 'Customer Deleted!');
    }
}