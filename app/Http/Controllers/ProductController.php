<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = [];
        for ($i = 1; $i <= 20; $i++) {
            $products[] = [
                'id' => $i,
                'name' => 'Produk ' . $i,
                'description' => 'Deskripsi produk ' . $i,
                'price' => rand(10000, 1000000)
            ];
        }
        
        return view('products.list', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('products');
    }

    public function edit($id)
    {
        $product = [
            'id' => $id,
            'name' => 'Produk ' . $id,
            'description' => 'Deskripsi produk ' . $id,
            'price' => rand(10000, 1000000)
        ];
        
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('products');
    }

    public function show($id)
    {
        $product = [
            'id' => $id,
            'name' => 'Produk ' . $id,
            'description' => 'Deskripsi produk ' . $id,
            'price' => rand(10000, 1000000)
        ];
        
        return view('products.show', compact('product'));
    }
}