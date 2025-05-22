@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Edit Produk</h1>
    <x-product-form 
        :action="route('products.update', $product['id'])"
        buttonText="Update Produk"
        :product="$product"
    />
@endsection