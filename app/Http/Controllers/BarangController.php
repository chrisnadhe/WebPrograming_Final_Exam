<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function barangall()
    {
        $barang = Barang::all();

        return view('barang.index', [
            'barang' => $barang,
        ]);
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_name' => 'required',
            'brand' => 'required',
            'price' => 'required|integer',
            'model_no' => 'required',
        ]);

        Barang::create($data);

        return redirect()->route('barang')->with('success', 'Data barang berhasil ditambahkan');
    }

    public function show(Barang $barang)
    {
        return view('barang.show', [
            'barang' => $barang,
        ]);
    }

    public function edit(Barang $barang)
    {
        return view('barang.edit', [
            'barang' => $barang,
        ]);
    }

    public function update(Request $request, Barang $barang)
    {
        $data = $request->validate([
            'product_name' => 'required',
            'brand' => 'required',
            'price' => 'required|integer',
            'model_no' => 'required',
        ]);

        $barang->update($data);

        return redirect()->route('barang')->with('success', 'Data barang berhasil diubah');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('barang')->with('success', 'Data barang berhasil dihapus');
    }
}
