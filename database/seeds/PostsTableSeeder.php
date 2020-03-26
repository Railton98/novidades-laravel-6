<?php

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 10000)->create()->each(function($post){
            $post->postImages()->save(
                factory(PostImage::class)->make()
            );
        });
    }
}
