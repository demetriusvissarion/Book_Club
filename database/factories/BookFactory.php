<?php

namespace Database\Factories;

// use App\Models\Category;
use App\Models\Book;
// use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        $image = $this->faker->randomElement([rand(1, 3)]);

        return [
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'excerpt' => '<p>' . implode('</p><p>', $this->faker->paragraphs(2)) . '</p>',
            'thumbnail' => 'thumbnails/illustration-' . $image . '.jpeg',
        ];
    }
}
