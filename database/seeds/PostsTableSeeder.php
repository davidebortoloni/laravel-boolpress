<?php

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 100; $i++) {
            $post = new Post();

            do {
                $fakeTitle = $faker->text(40);
            } while (Post::where('title', $fakeTitle)->first());
            $post->title = $fakeTitle;
            $post->content = $faker->text(500);
            $post->slug = Str::slug($post->title, '-');
            $post->image = $faker->imageUrl(640, 480, 'animals', true);;

            $post->save();
        }
    }
}
