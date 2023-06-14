<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(4)->create();
        $tags = Tag::factory(7)->create();
        $posts = Post::factory(40)->create();

        foreach($posts as $post){
            $tagId = $tags->random(5)->pluck('id');
            $post->tags()->attach($tagId);
        }

        Role::factory()
                ->count(4)
                ->state(new Sequence(
                    ['title' => 'user'],
                    ['title' => 'manager'],
                    ['title' => 'moderator'],
                    ['title' => 'admin'],
                ))
                ->create();
    }
}
