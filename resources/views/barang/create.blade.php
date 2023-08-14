@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Barang / Tambah'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('barang.store') }}" method="post">
                    @csrf

                    <div class="card card-frame">
                        <div class="card-body">
                            <h3>Buat Transaksi</h3>
                
                            <div class="form-group">
                                <label for="product_name" class="form-control-label">Product Name</label>
                                <input class="form-control" type="text" name="product_name" id="product_name">
                            </div>
                        
                            <div class="form-group">
                                <label for="brand" class="form-control-label">Brand</label>
                                <input class="form-control" type="text" name="brand" id="brand">
                            </div>
                        
                            <div class="form-group">
                                <label for="price" class="form-control-label">Price</label>
                                <input class="form-control" type="number" name="price" id="price">
                            </div>
                        
                            <div class="form-group">
                                <label for="model_no" class="form-control-label">Model No</label>
                                <input class="form-control" type="text" name="model_no" id="model_no">
                            </div>
                        
                            <button class="btn btn-primary" type="submit">Create Barang</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
