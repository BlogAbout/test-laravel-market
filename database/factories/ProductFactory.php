<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $inStoke = $this->faker->boolean;
        $hasOldCost = $this->faker->boolean;
        $cost = $this->faker->randomFloat(2, 300, 5000);

        return [
            'name' => $this->faker->sentence(4),
            'description' => $this->faker->text,
            'cost' => $cost,
            'cost_old' => $hasOldCost ? $this->faker->randomFloat(2, $cost + 10, 5000) : '0.00',
            'author_id' => User::get()->random()->id,
            'status' => 'publish',
            'in_stoke' => $inStoke ? $this->faker->randomFloat(0, 5, 999) : 0,
            'meta_title' => $this->faker->sentence(5),
            'meta_description' => $this->faker->text,
            'receipt_at' => !$inStoke ? now()->addDays($this->faker->randomFloat(0, 0, 40)) : null
        ];
    }
}
