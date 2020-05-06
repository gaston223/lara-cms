<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostsController extends Controller
{
    /**
     * @param Post $post
     * @return Factory|View
     */
    public function show(Post $post)
    {
        return view('blog.show')->with('post', $post);
    }
}
