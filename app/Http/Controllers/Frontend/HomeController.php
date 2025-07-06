<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::active()->latestFirst()->limit(3)->get();
        $featured = Product::where('status', 'active')->where('is_featured', 1)->orderBy('price', 'DESC')->limit(2)->get();
        $productList = Product::where('status', 'active')->orderBy('id', 'DESC')->limit(8)->get();
        $latestProduct = Product::where('status', 'active')->orderBy('id', 'DESC')->limit(8)->get();
        $categoryList = Category::where('status', 'active')->where('is_parent', 1)->orderBy('title', 'ASC')->get();
        $limitedCategories = Category::where('status', 'active')->limit(3)->get();

        return view('frontend.index', compact('banners', 'featured', 'productList', 'latestProduct', 'categoryList', 'limitedCategories'));
    }
}
