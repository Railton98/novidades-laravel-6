<?php

use App\Post;
use App\PostImage;
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
            $post->post_images()->save(
                factory(PostImage::class)->make()
            );
        });
    }
}
