<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $title = $this->faker->sentence(3);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'summary' => $this->faker->paragraph,
            'description' => $this->faker->text,
            'photo' => '',
            'stock' => $this->faker->numberBetween(1, 100),
            'size' => $this->faker->randomElement(['S', 'M', 'L', 'XL']),
            'condition' => $this->faker->randomElement(['default', 'new', 'hot']),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'discount' => $this->faker->randomFloat(2, 0, 50),
            'is_featured' => $this->faker->boolean,
            'cat_id' => Category::inRandomOrder()->first()->id,
            'child_cat_id' => null,
            'brand_id' => Brand::inRandomOrder()->first()->id,
        ];
    }
}
