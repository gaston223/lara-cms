<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tags\CreateTagRequest;
use App\Http\Requests\Tags\UpdateTagRequest;
use App\Tag;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class TagsController extends Controller
{
    /**
     * Affiche la liste des tags.
     *
     * @return Factory|View
     */
    public function index()
    {

        return view('tags.index')->with('tags', $tags=Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateTagRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(CreateTagRequest $request)
    {

        Tag::create([
            'name' => $request->name
        ]);

        session()->flash('success', 'Le tag a été crée avec succès !');

        return redirect(route('tags.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tag $tag
     * @return Factory|View
     */
    public function edit(Tag $tag)
    {
        return view('tags.create')->with('tag', $tag );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTagRequest $request
     * @param Tag $tag
     * @return RedirectResponse|Redirector
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->update([
            'name'=>$request->name
        ]);

        session()->flash('success', 'Le tag a été modifiée avec succès !');

        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tag $tag
     * @return RedirectResponse|Redirector
     * @throws \Exception
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        session()->flash('success','Le tag a bien été supprimée');

        return redirect(route('tags.index'));
    }
}
