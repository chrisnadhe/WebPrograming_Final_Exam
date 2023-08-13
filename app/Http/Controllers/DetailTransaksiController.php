<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Customers;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DetailTransaksiController extends Controller
{
    public function index()
    {
        $detailTransaksis = DetailTransaksi::with(['transaksi', 'barang'])->get();

        return view('detail_transaksi.index', [
            'detailTransaksis' => $detailTransaksis,
        ]);
    }

    public function create()
    {
        $barangs = Barang::all();
        $transaksis = Transaksi::all();

        return view('detail_transaksi.create', [
            'barangs' => $barangs,
            'transaksis' => $transaksis,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'transaksi_id' => 'required',
            'barang_id' => 'required',
            'qty' => 'required|integer',
            'price' => 'required|integer',
        ]);

        DetailTransaksi::create($data);

        return redirect()->route('detail_transaksi.index')->with('success', 'Data detail transaksi berhasil ditambahkan');
    }

    public function show(DetailTransaksi $detailTransaksi)
    {
        return view('detail_transaksi.show', [
            'detailTransaksi' => $detailTransaksi,
        ]);
    }

    public function edit(DetailTransaksi $detailTransaksi)
    {
        $barangs = Barang::all();
        $transaksis = Transaksi::all();

        return view('detail_transaksi.edit', [
            'detailTransaksi' => $detailTransaksi,
            'barangs' => $barangs,
            'transaksis' => $transaksis,
        ]);
    }

    public function update(Request $request, DetailTransaksi $detailTransaksi)
    {
        $data = $request->validate([
            'transaksi_id' => 'required',
            'barang_id' => 'required',
            'qty' => 'required|integer',
            'price' => 'required|integer',
        ]);

        $detailTransaksi->update($data);

        return redirect()->route('detail_transaksi.index')->with('success', 'Data detail transaksi berhasil diubah');
    }

    public function destroy(DetailTransaksi $detailTransaksi)
    {
        $detailTransaksi->delete();

        return redirect()->route('detail_transaksi.index')->with('success', 'Data detail transaksi berhasil dihapus');
    }
}
