<?php

namespace Database\Factories;

use App\Helpers\UserRoles;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => 'admin@admin.com',
            'role' => UserRoles::MANAGER,
            'password' => bcrypt(12345), // password
        ];
    }
}
