<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Brand::class;

    public function definition(): array
    {
        $title = $this->faker->unique()->word;

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
