<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $postsPaginate = Post::orderBy('created_at', 'desc')->simplePaginate(8);

        return view('welcomebis')
            ->with('categories', Category::all())
            ->with('tags', Tag::all())
            ->with('posts', Post::orderBy('created_at','desc')->get())
            ->with('postsPaginate', $postsPaginate)
            ;
    }
}
