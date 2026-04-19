<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        return view('suppliers.create');
    }

   public function store(Request $request)
{
    if (auth()->user()->role !== 'admin') {
        abort(403);
    }

    $request->validate([
        'name' => 'required|min:3',
        'email' => 'required|email',
    ]);

    Supplier::create($request->all());

    return redirect()->route('suppliers.index')
        ->with('success', 'Supplier added successfully!');
}

    public function edit(Supplier $supplier)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        return view('suppliers.edit', compact('supplier'));
    }

public function update(Request $request, Supplier $supplier)
{
    if (auth()->user()->role !== 'admin') {
        abort(403);
    }

    $request->validate([
        'name' => 'required|min:3',
        'email' => 'required|email',
    ]);

    $supplier->update($request->all());

    return redirect()->route('suppliers.index')
        ->with('success', 'Supplier updated successfully!');
}

    public function destroy(Supplier $supplier)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $supplier->delete();
        return redirect()->route('suppliers.index');
    }
}