<?php

namespace App\Http\Controllers;

use App\Models\NomorSeri;
use Illuminate\Http\Request;

class NomorSeriController extends Controller
{
    public function index()
    {
        $nomorSeris = NomorSeri::all();

        return view('nomor_seri.index', [
            'nomorSeris' => $nomorSeris,
        ]);
    }

    public function create()
    {
        return view('nomor_seri.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'barang_id' => 'required',
            'serial_no' => 'required',
        ]);

        NomorSeri::create($data);

        return redirect()->route('nomor_seri.index')->with('success', 'Data nomor seri berhasil ditambahkan');
    }

    public function show(NomorSeri $nomorSeri)
    {
        return view('nomor_seri.show', [
            'nomorSeri' => $nomorSeri,
        ]);
    }

    public function edit(NomorSeri $nomorSeri)
    {
        return view('nomor_seri.edit', [
            'nomorSeri' => $nomorSeri,
        ]);
    }

    public function update(Request $request, NomorSeri $nomorSeri)
    {
        $data = $request->validate([
            'barang_id' => 'required',
            'serial_no' => 'required',
        ]);

        $nomorSeri->update($data);

        return redirect()->route('nomor_seri.index')->with('success', 'Data nomor seri berhasil diubah');
    }

    public function destroy(NomorSeri $nomorSeri)
    {
        $nomorSeri->delete();

        return redirect()->route('nomor_seri.index')->with('success', 'Data nomor seri berhasil dihapus');
    }
}
