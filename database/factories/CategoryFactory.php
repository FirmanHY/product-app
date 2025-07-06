<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        $title = $this->faker->unique()->word;

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'summary' => $this->faker->sentence,
            'photo' => $this->faker->imageUrl(),
            'is_parent' => 1,
            'parent_id' => null,
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'added_by' => null,

        ];
    }
}
