<?php

namespace App\Http\Controllers;

use App\Category;

use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoriesRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class CategoriesController extends Controller
{
    /**
     * Affiche la liste des catégories.
     *
     * @return Factory|View
     */
    public function index()
    {

        return view('categories.index')->with('categories', $categories=Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCategoryRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(CreateCategoryRequest $request)
    {

        Category::create([
            'name' => $request->name
        ]);

        session()->flash('success', 'La catégorie a été crée avec succès !');

        return redirect(route('categories.index'));

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
     * @param Category $category
     * @return Factory|View
     */
    public function edit(Category $category)
    {
        return view('categories.create')->with('category', $category );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategoriesRequest $request
     * @param Category $category
     * @return RedirectResponse|Redirector
     */
    public function update(UpdateCategoriesRequest $request, Category $category)
    {
        $category->update([
            'name'=>$request->name
        ]);

        session()->flash('success', 'La catégorie a été modifiée avec succès !');

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse|Redirector
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        if($category->posts->count() > 0){
            session()->flash('error','La catégorie ne peut pas être supprimée, il contient des articles !');
            return redirect()->back();
        }
        $category->delete();

        session()->flash('success','La catégorie a bien été supprimée');

        return redirect(route('categories.index'));
    }
}
