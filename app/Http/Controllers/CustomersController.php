<?php

namespace App\Http\Controllers;

use App\Models\customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index() {
        $customers = customers::all();
        return view('customers.index', compact('customers'));
    }

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