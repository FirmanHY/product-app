<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'title' => 'Sports Footwear',
                'slug' => 'sports-footwear',
                'summary' => 'High-quality athletic shoes for running, basketball, and more.',
                'photo' => null,
                'is_parent' => true,
                'parent_id' => null,
                'added_by' => null,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Athletic Apparel',
                'slug' => 'athletic-apparel',
                'summary' => 'Comfortable and stylish sportswear for men and women.',
                'photo' => null,
                'is_parent' => true,
                'parent_id' => null,
                'added_by' => null,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Fitness Equipment',
                'slug' => 'fitness-equipment',
                'summary' => 'Gear for gym, yoga, and outdoor sports activities.',
                'photo' => null,
                'is_parent' => true,
                'parent_id' => null,
                'added_by' => null,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
