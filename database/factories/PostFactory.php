<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=> $this->faker->sentence(7),
            'content' => $this->faker->text,
            'img' => $this->faker->imageUrl(),
            'approved' => rand(0,1),
            'category_id' => Category::get()->random()->id,
        ];
    }
}
