<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body' => $this->faker->sentence(20),
        ];
    }
}
// factory wurde erstellt durch artisan model mit dem -f flag
//php artisan tinker, referenced post model, uses factory, choose how many record be created mit was: user_id
//App\Models\Post::factory()->times(200)->create(['user_id'=>3]); um die datenbank mit beispiel
