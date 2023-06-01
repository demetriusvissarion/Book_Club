<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
use Faker\Factory as FakerFactory;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Demetrius Vissarion',
            'username' => 'DemetriusVissarion',
            'email' => 'demetrius.vissarion@gmail.com',
            'password' => 'password',
        ]);

        User::factory(20)->create();

        $categories = [
            'Fantasy',
            'Adventure',
            'Romance',
            'Contemporary',
            'Dystopian',
            'Mystery',
            'Horror',
            'Thriller',
            'Paranormal',
            'Historical fiction',
            'Science Fiction',
            'Children’s',
            'Memoir',
            'Cookbook',
            'Art',
            'Self-help',
            'Development',
            'Motivational',
            'Health',
            'History',
            'Travel',
            'Guide / How-to',
            'Families & Relationships',
            'Humor',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => \Illuminate\Support\Str::slug($category),
            ]);
        }

        $categoryIds = Category::pluck('id')->toArray();

        $faker = FakerFactory::create();

        $bookCount = 50;
        $booksPerUser = 5;
        $userIds = User::pluck('id')->toArray();

        for ($i = 0; $i < $bookCount; $i++) {
            $book = Book::factory()->create([
                'user_id' => $faker->randomElement($userIds),
                'category_id' => $faker->randomElement($categoryIds),
                'title' => $faker->sentence($faker->numberBetween(1, 4)),
            ]);

            Comment::factory(2)->create([
                'book_id' => $book->id,
                'user_id' => $faker->randomElement($userIds),
            ]);

            if (($i + 1) % $booksPerUser === 0) {
                $userIds = array_diff($userIds, [$book->user_id]);
            }
        }
    }
}
