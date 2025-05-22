<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
       
        $products = session()->get('products', []);
        
      
        if (empty($products)) {
            $products = [];
            for ($i = 1; $i <= 20; $i++) {
                $products[] = [
                    'id' => $i,
                    'name' => 'Produk ' . $i,
                    'description' => 'Deskripsi produk ' . $i,
                    'price' => rand(10000, 1000000)
                ];
            }
          
            session()->put('products', $products);
        }
        
        return view('products.list', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
  
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

     
        $products = session()->get('products', []);
        
    
        $newId = empty($products) ? 1 : max(array_column($products, 'id')) + 1;
        

        array_unshift($products, [
            'id' => $newId,
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
        ]);

        
        session()->put('products', $products);

        return redirect()->route('products')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
       
        $products = session()->get('products', []);
        
       
        $product = collect($products)->firstWhere('id', $id);
        
       
        if (!$product) {
            return redirect()->route('products')->with('error', 'Produk tidak ditemukan');
        }
        
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
      
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

      
        $products = session()->get('products', []);
        
      
        foreach ($products as $key => $product) {
            if ($product['id'] == $id) {
                $products[$key] = [
                    'id' => $id,
                    'name' => $validatedData['name'],
                    'description' => $validatedData['description'],
                    'price' => $validatedData['price'],
                ];
                break;
            }
        }

   
        session()->put('products', $products);

        return redirect()->route('products')->with('success', 'Produk berhasil diperbarui!');
    }

    public function show($id)
    {
        
        $products = session()->get('products', []);
   
        $product = collect($products)->firstWhere('id', $id);
        
       
        if (!$product) {
            return redirect()->route('products')->with('error', 'Produk tidak ditemukan');
        }
        
        return view('products.show', compact('product'));
    }
}