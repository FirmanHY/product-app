<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banners = [
            [
                'title' => 'Summer Sport Sale',
                'slug' => Str::slug('Summer Sport Sale'),
                'photo' => '/images/banners/summer-sport-sale.jpg',
                'description' => 'Get up to 50% off on running shoes, gym wear, and sports equipment this summer! Shop now and gear up for your active lifestyle.',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'New Arrival: Performance Gear',
                'slug' => Str::slug('New Arrival: Performance Gear'),
                'photo' => '/images/banners/performance-gear.jpg',
                'description' => 'Discover the latest in high-performance sports apparel and accessories. Engineered for athletes, designed for champions.',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Winter Fitness Challenge',
                'slug' => Str::slug('Winter Fitness Challenge'),
                'photo' => '/images/banners/winter-fitness.jpg',
                'description' => 'Stay fit this winter with our premium workout gear. Join the challenge and save 30% on selected items!',
                'status' => 'inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($banners as $banner) {
            Banner::create($banner);
        }
    }
}
