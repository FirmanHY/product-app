<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productSearch(Request $request)
    {
        $recent_products = Product::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();
        $sidebarData = $this->getSidebarData();
        $products = Product::orwhere('title', 'like', '%'.$request->search.'%')
            ->orwhere('slug', 'like', '%'.$request->search.'%')
            ->orwhere('description', 'like', '%'.$request->search.'%')
            ->orwhere('summary', 'like', '%'.$request->search.'%')
            ->orwhere('price', 'like', '%'.$request->search.'%')
            ->orderBy('id', 'DESC')
            ->paginate('9');

        return view('frontend.pages.product-grids')->with('products', $products)->with('recent_products', $recent_products)->with($sidebarData);
    }

    public function productLists()
    {
        $products = Product::query();

        if (! empty($_GET['category'])) {
            $slug = explode(',', $_GET['category']);
            $cat_ids = Category::select('id')->whereIn('slug', $slug)->pluck('id')->toArray();
            $products->whereIn('cat_id', $cat_ids);
        }
        if (! empty($_GET['brand'])) {
            $brand_slugs = explode(',', $_GET['brand']);
            $brand_ids = Brand::select('id')->whereIn('slug', $brand_slugs)->pluck('id')->toArray();
            $products->whereIn('brand_id', $brand_ids);
        }
        if (! empty($_GET['sortBy'])) {
            if ($_GET['sortBy'] == 'title') {
                $products = $products->where('status', 'active')->orderBy('title', 'ASC');
            }
            if ($_GET['sortBy'] == 'price') {
                $products = $products->orderBy('price', 'ASC');
            }
        }
        if (! empty($_GET['price'])) {
            $price = explode('-', $_GET['price']);
            $products->whereBetween('price', $price);
        }

        $sidebarData = $this->getSidebarData();
        $products = $products->where('status', 'active')->paginate($_GET['show'] ?? 6);

        return view('frontend.pages.product-lists')->with('products', $products)->with($sidebarData);
    }

    public function productFilter(Request $request)
    {
        $data = $request->all();
        $queryParams = [];

        // Handle 'category'
        if (! empty($data['category'])) {
            if (is_array($data['category'])) {
                $queryParams['category'] = implode(',', $data['category']);
            } else {
                $queryParams['category'] = $data['category'];
            }
        }

        // Handle 'brand'
        if (! empty($data['brand'])) {
            if (is_array($data['brand'])) {
                $queryParams['brand'] = implode(',', $data['brand']);
            } else {
                $queryParams['brand'] = $data['brand'];
            }
        }

        // Handle 'price' atau 'price_range'
        if (! empty($data['price']) || ! empty($data['price_range'])) {
            $queryParams['price'] = $data['price'] ?? $data['price_range'];
        }

        // Handle 'show'
        if (! empty($data['show'])) {
            $queryParams['show'] = $data['show'];
        }

        // Handle 'sortBy'
        if (! empty($data['sortBy'])) {
            $queryParams['sortBy'] = $data['sortBy'];
        }

        // Tentuin view type, ambil dari POST atau query, default 'list'
        $viewType = $data['view'] ?? $request->query('view', 'list');
        $queryParams['view'] = $viewType;

        // Redirect ke route yang sesuai
        return redirect()->route(
            $viewType === 'grid' ? 'product-grids' : 'product-lists',
            $queryParams
        );
    }

    public function productDetail($slug)
    {
        $product_detail = Product::getProductBySlug($slug);

        return view('frontend.pages.product_detail')->with('product_detail', $product_detail);
    }

    public function productGrids()
    {
        $products = Product::query();

        if (! empty($_GET['category'])) {
            $slug = explode(',', $_GET['category']);
            $cat_ids = Category::select('id')->whereIn('slug', $slug)->pluck('id')->toArray();
            $products->whereIn('cat_id', $cat_ids);
        }
        if (! empty($_GET['brand'])) {
            $brand_slugs = explode(',', $_GET['brand']);
            $brand_ids = Brand::select('id')->whereIn('slug', $brand_slugs)->pluck('id')->toArray();
            $products->whereIn('brand_id', $brand_ids);
        }
        if (! empty($_GET['sortBy'])) {
            if ($_GET['sortBy'] == 'title') {
                $products = $products->where('status', 'active')->orderBy('title', 'ASC');
            }
            if ($_GET['sortBy'] == 'price') {
                $products = $products->orderBy('price', 'ASC');
            }
        }
        if (! empty($_GET['price'])) {
            $price = explode('-', $_GET['price']);
            $products->whereBetween('price', $price);
        }

        $sidebarData = $this->getSidebarData();
        $products = $products->where('status', 'active')->paginate($_GET['show'] ?? 9);

        return view('frontend.pages.product-grids')->with('products', $products)->with($sidebarData);
    }

    private function getSidebarData()
    {
        return [
            'recent_products' => Product::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get(),
            'menu' => Category::getAllParentWithChild(),
            'max_price' => Product::max('price'),
            'brands' => Brand::where('status', 'active')->orderBy('title', 'ASC')->get(),
            'current_price_range' => request()->query('price', ''),
        ];
    }
}
