<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'status'];

    public function products()
    {
        return $this->hasMany(Product::class)->where('status', 'active');
    }

    public static function getProductByBrand($slug)
    {

        return Brand::with('products')->where('slug', $slug)->first();

    }
}
