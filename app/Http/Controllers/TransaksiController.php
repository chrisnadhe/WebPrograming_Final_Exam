<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Customers;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['detailTransaksis', 'customer'])->get();

        return view('transaksi.index', [
            'transaksis' => $transaksis,
        ]);
    }

    public function create()
    {
        $barangs = Barang::all();
        $customers = Customers::all();

        return view('transaksi.create', [
            'barangs' => $barangs,
            'customers' => $customers,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'tanggal' => 'required',
            'no_trans' => 'required',
            'tipe_trans' => 'required',
            'customer_id' => 'required',
        ]);

        $transaksi = Transaksi::create($data);

        $detailTransaksis = $request->input('detail_transaksis');

        foreach ($detailTransaksis as $key => $detailTransaksi) {
            $detailTransaksi['transaksi_id'] = $transaksi->id;
            $detailTransaksi['barang_id'] = $detailTransaksi['id'];

            DetailTransaksi::create($detailTransaksi);
        }

        return redirect()->route('transaksi.index')->with('success', 'Data transaksi berhasil ditambahkan');
    }

    public function show(Transaksi $transaksi)
    {
        return view('transaksi.show', [
            'transaksi' => $transaksi,
        ]);
    }

    public function edit(Transaksi $transaksi)
    {
        $barangs = Barang::all();
        $customers = Customers::all();

        return view('transaksi.edit', [
            'transaksi' => $transaksi,
            'barangs' => $barangs,
            'customers' => $customers,
        ]);
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $data = $request->validate([
            'tanggal' => 'required',
            'no_trans' => 'required',
            'tipe_trans' => 'required',
            'customer_id' => 'required',
        ]);

        $transaksi->update($data);

        $detailTransaksis = $request->input('detail_transaksis');

        foreach ($detailTransaksis as $key => $detailTransaksi) {
            $detailTransaksi['transaksi_id'] = $transaksi->id;
            $detailTransaksi['barang_id'] = $detailTransaksi['id'];

            $detailTransaksi = DetailTransaksi::find($detailTransaksi['id']);
            $detailTransaksi->update($detailTransaksi);
        }

        return redirect()->route('transaksi.index')->with('success', 'Data transaksi berhasil diubah');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Data transaksi berhasil dihapus');
    }
}
