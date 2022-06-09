<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class blogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Blog::class;

    public function definition()
    {
        return [
            'user_id' => function() {
                    return User::pluck('id')->random();
            },
            'title' => $this->faker->title,
            'description' => $this->faker->text,
        ];
    }
}
