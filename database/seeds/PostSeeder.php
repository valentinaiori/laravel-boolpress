<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++){
            $post = new Post();
            $post->title = $faker->realText($maxNmbChars = 200, $indexSize = 2);
            $post->content = $faker->text();
            $slug=Str::slug ($post->title);
            $slug_base = $slug;
            $counter = 1;
            $existingPost = Post::where('slug', $slug)->first();
            while($existingPost){
                $slug = $slug_base . '_' . $counter;
                $existingPost = Post::where('slug', $slug)->first();
                $counter++;
            }
            $post->slug = $slug;
            $post->save();
        }
    }
}
