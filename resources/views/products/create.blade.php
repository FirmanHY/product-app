@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Tambah Produk Baru</h1>
    <x-product-form 
        :action="route('products.store')"
        buttonText="Simpan Produk"
    />
@endsection