<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        $image = $this->faker->randomElement([rand(1, 3)]);

        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'excerpt' => '<p>' . implode('</p><p>', $this->faker->paragraphs(2)) . '</p>',
//            'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(6)) . '</p>',
            'thumbnail' => 'thumbnails/illustration-' . $image . '.jpeg',
        ];
    }
}
