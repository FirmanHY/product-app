@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Daftar Produk</h1>
    
    <a href="{{ route('products.create') }}" class="btn btn-success mb-3">+ Tambah Produk</a>
    
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product['name'] }}</h5>
                        <p class="card-text">{{ $product['description'] }}</p>
                        <p class="text-primary">Rp {{ number_format($product['price'], 0, ',', '.') }}</p>
                        <div class="d-flex gap-2">
                            <a href="{{ route('products.show', $product['id']) }}" class="btn btn-sm btn-info">Detail</a>
                            <a href="{{ route('products.edit', $product['id']) }}" class="btn btn-sm btn-warning">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection