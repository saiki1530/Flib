<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userList = User::pluck('id')->toArray();
        $slug = fake()->name();
        return [
            'id_users' => fake()->randomElement($userList),
            'introduction' => $slug,
            'slug' => Str::slug($slug),
            'content' => fake()->text(),
            'avt' => 'https://thumbs.dreamstime.com/z/review-concept-magnify-glass-d-text-white-background-46072553.jpg?w=992',
            'status' => 1,
            'visibility' => 1
        ];
    }
}
