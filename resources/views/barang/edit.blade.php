@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Barang / Edit'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('barang.update', $barang->id) }}" method="post">
                    @csrf
                    @method('PUT')
                
                    <div class="card card-frame">
                        <div class="card-body">
                            <h3>Edit Barang</h3>
                
                            <div class="form-group">
                                <label for="product_name" class="form-control-label">Product Name</label>
                                <input class="form-control" type="text" name="product_name" id="product_name" value="{{ $barang->product_name }}">
                            </div>
                
                            <div class="form-group">
                                <label for="brand" class="form-control-label">Brand</label>
                                <input class="form-control" type="text" name="brand" id="brand" value="{{ $barang->brand }}">
                            </div>
                
                            <div class="form-group">
                                <label for="price" class="form-control-label">Price</label>
                                <input class="form-control" type="number" name="price" id="price" value="{{ $barang->price }}">
                            </div>
                
                            <div class="form-group">
                                <label for="model_no" class="form-control-label">Model No</label>
                                <input class="form-control" type="text" name="model_no" id="model_no" value="{{ $barang->model_no }}">
                            </div>
                
                            <button class="btn btn-primary" type="submit">Update Barang</button>
                        </div>
                    </div>
                </form>
                <div class="card card-frame mt-3">
                    <div class="card-body">
                        <h3>Delete Barang</h3>
                        <p>Do you really want to delete this barang?</p>
                        <p>To delete, click the button below.</p>
            
                        <form action="{{ route('barang.delete', $barang->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                        
                            <input type="hidden" name="id" value="{{ $barang->id }}">
                        
                            <button type="submit" class="btn btn-danger" data-confirm="Are you sure you want to delete this barang?">Delete Barang</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
