<?php

use App\Category;
use App\Post;
use App\Tag;
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

        $category1 = Category::create([
            'name' => 'News'
        ]);

        $category2 = Category::create([
            'name' => 'Marketing'
        ]);

        $category3 = Category::create([
            'name' => 'Design'
        ]);

        $category4 = Category::create([
            'name' => 'Hiring'
        ]);

        $post1 = Post::create([
            'title' => 'We relocated our office to a new designed garage',
            'description' => 'It is a long established fact that a reader',
            'content' => 'There are many variations of passages of Lorem Ipsum available, by injected humour',
            'category_id' => $category1->id,
            'image' => 'posts/1.jpg',
            'user_id'=> 1
        ]);

        $post2 = Post::create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'It is a long established fact that a reader',
            'content' => 'There are many variations of passages of Lorem Ipsum available, by injected humour',
            'category_id' => $category2->id,
            'image' =>'posts/1.jpg',
            'user_id'=> 1,
        ]);

        $post3 = Post::create([
            'title' => 'Best practices for minimalist design with example',
            'description' => 'It is a long established fact that a reader',
            'content' => 'There are many variations of passages of Lorem Ipsum available, by injected humour',
            'category_id' => $category3->id,
            'image' => 'posts/3.jpg',
            'user_id'=> 1

        ]);

        $post4 = Post::create([
            'title' => 'Congratulate and thank to Maryam for joining our team',
            'description' => 'It is a long established fact that a reader',
            'content' => 'There are many variations of passages of Lorem Ipsum available, by injected humour',
            'category_id' => $category4->id,
            'image' => 'posts/4.jpg',
            'user_id'=> 1
        ]);

        $tag1 = Tag::create([
            'name' => 'job',
        ]);

        $tag2 = Tag::create([
            'name' => 'customers',
        ]);
        $tag3 = Tag::create([
            'name' => 'record',
        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag2->id, $tag3->id]);
        $post3->tags()->attach([$tag1->id, $tag3->id]);
    }
}
