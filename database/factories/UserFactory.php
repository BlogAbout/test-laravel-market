<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'type' => $this->faker->randomFloat(0, 1, 2),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'phone' => $this->faker->unique()->phoneNumber,
            'password' => '$2y$10$HrJ5Vq.kwzmjks/nRkGz8Oprib3THznXpcjaDh2uerieGjb3Q3Zoy',
            'created_at' => now()->subDays($this->faker->randomFloat(0, 0, 40))
        ];
    }
}
