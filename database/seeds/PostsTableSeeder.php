<?php

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        $author1 = App\User::create([
            'name' => 'Gaoussou Coulibaly',
            'image' =>'https://pbs.twimg.com/profile_images/1235570962118119424/Q0yEKjH__400x400.jpg',
            'email' => 'gaoussou.coulibaly@hotmail.com',
            'password' => Hash::make('password'),
        ]);

        $author2 = App\User::create([
            'name' => 'Abdoulaye Coulibaly',
            'email' => 'abdoulaye.coulibaly@hotmail.com',
            'image' => 'https://pbs.twimg.com/profile_images/1171776152358268928/wQXHer54_400x400.jpg',
            'password' => Hash::make('password')
        ]);

        $post1 = Post::create([
            'title' => 'We relocated our office to a new designed garage',
            'description' => 'It is a long established fact that a reader',
            'content' => 'There are many variations of passages of Lorem Ipsum available, by injected humour',
            'category_id' => $category1->id,
            'image' => 'posts/1.jpg',
            'user_id'=> $author1->id
        ]);

        $post2 = Post::create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'It is a long established fact that a reader',
            'content' => 'There are many variations of passages of Lorem Ipsum available, by injected humour',
            'category_id' => $category2->id,
            'image' =>'posts/1.jpg',
            'user_id'=> $author2->id
        ]);

        //Une autre manière de créer le post
        $post3 = $author1->posts()->create([
            'title' => 'Best practices for minimalist design with example',
            'description' => 'It is a long established fact that a reader',
            'content' => 'There are many variations of passages of Lorem Ipsum available, by injected humour',
            'category_id' => $category3->id,
            'image' => 'posts/3.jpg',
        ]);

        $post4 = Post::create([
            'title' => 'Congratulate and thank to Maryam for joining our team',
            'description' => 'It is a long established fact that a reader',
            'content' => 'There are many variations of passages of Lorem Ipsum available, by injected humour',
            'category_id' => $category4->id,
            'image' => 'posts/4.jpg',
            'user_id'=> $author2->id
        ]);

        $tag1 = Tag::create([
            'name' => 'Développement Web',
        ]);

        $tag2 = Tag::create([
            'name' => 'Marketing',
        ]);
        $tag3 = Tag::create([
            'name' => 'Gestion de Projet',
        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag2->id, $tag3->id]);
        $post3->tags()->attach([$tag1->id, $tag3->id]);
    }
}
