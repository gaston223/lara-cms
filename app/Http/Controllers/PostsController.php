<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Post;
use App\Tag;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;


class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('verifyCategoriesCount')->only(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('posts.create')->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePostsRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(CreatePostsRequest $request)
    {
        //dd($request->all());
        //upload the image to storage
       $image = $request->image->store('posts');

        //create the post
        $post = Post::create([
            'title'=> $request->title,
            'description' =>$request->description,
            'content'=> $request->content,
            'image' =>$image,
            'published_at' =>$request->published_at,
            'user_id' => auth()->user()->id,
        ]);

        $post->category_id=$request['category'];
        $post->save();
        if($request->tags){
            $post->tags()->attach($request->tags);
        }

        //flash message
        session()->flash('success', 'L\'article a été crée avec succès !');

        //redirect user
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post',$post)->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $user = auth()->user();
        $data = $request->only(['title', 'description', 'published_at', 'content']);

        //check s'il ya une image
        if($request->hasFile('image')){
            //si oui upload
            $image = $request->image->store('posts');

            //supprimer l'ancien
            $post->deleteImage();

            $data['image'] = $image;
        }

        if($request->tags){
            $post->tags()->sync($request->tags);
        }
        $post['user_id'] = $user->id;
        $post['category_id'] = $request->category;
        //update le post
        $post->update($data);

        //flash message
        session()->flash('success', 'L\'Article a bien été modifié');

        // redirection
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        if ($post->trashed()){
            $post->deleteImage();
            $post->forceDelete();
        }else{
            $post->delete();
        }

        session()->flash('success', 'L\'article a été archivé avec succès !');
        return redirect(route('posts.index'));

    }


    /**
     * Affiche la liste des articles archivés
     */
    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();

        return view('posts.index')->with('posts', $trashed);
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        $post->restore();


        session()->flash('success', 'L\'article a été restauré avec succès !');

        return redirect()->back();
    }

}
