@extends('layouts.app')

@section('content')
    <h1>Detail Produk</h1>
    <p><strong>ID:</strong> {{ $product->id }}</p>
    <p><strong>Name:</strong> {{ $product->name }}</p>
    <p><strong>Description:</strong> {{ $product->description }}</p>
    <p><strong>Price:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}</p>
@endsection