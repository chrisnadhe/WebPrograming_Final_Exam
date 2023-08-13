<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customers::all();

        return view('customers.index', [
            'customers' => $customers,
        ]);
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required',
        ]);

        Customers::create($data);

        return redirect()->route('customers.index')->with('success', 'Data customer berhasil ditambahkan');
    }

    public function show(Customers $customer)
    {
        return view('customers.show', [
            'customer' => $customer,
        ]);
    }

    public function edit(Customers $customer)
    {
        return view('customers.edit', [
            'customer' => $customer,
        ]);
    }

    public function update(Request $request, Customers $customer)
    {
        $data = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required',
        ]);

        $customer->update($data);

        return redirect()->route('customers.index')->with('success', 'Data customer berhasil diubah');
    }

    public function destroy(Customers $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Data customer berhasil dihapus');
    }
}
