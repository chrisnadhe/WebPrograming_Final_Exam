@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tambah / Transaksi'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('transaksi.store') }}" method="post">
                    @csrf
                
                    <div class="card card-frame">
                        <div class="card-body">
                            <h3>Buat Transaksi</h3>
                
                            <div class="form-group">
                                <label for="tanggal" class="form-control-label">Tanggal</label>
                                <input class="form-control" type="date" name="tanggal" id="tanggal">
                            </div>
                
                            <div class="form-group">
                                <label for="no_trans" class="form-control-label">No Trans</label>
                                <input class="form-control" type="number" name="no_trans" id="no_trans">
                            </div>
                
                            <div class="form-group">
                                <label for="tipe_trans" class="form-control-label">Tipe Trans</label>
                                <select class="form-control" name="tipe_trans" id="tipe_trans">
                                    <option value="pembelian">Pembelian</option>
                                    <option value="penjualan">Penjualan</option>
                                </select>
                            </div>
                
                            <div class="form-group">
                                <label for="customer_id" class="form-control-label">Customer ID</label>
                                <input class="form-control" type="number" name="customer_id" id="customer_id">
                            </div>
                
                            <div class="form-group">
                                <label for="vendor" class="form-control-label">Vendor</label>
                                <input class="form-control" type="text" name="vendor" id="vendor">
                            </div>
                
                            <button class="btn btn-primary" type="submit">Create Transaksi</button>
                        </div>
                    </div>
                </form>                
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
