<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'price' => $this->faker->numberBetween(1,100),
            'description' => '<p>' . implode('</p><p>', $this->faker->paragraphs(2)) . '</p>',
        ];
    }
}
