<?php

namespace App\Http\Controllers\Catalogs;

use App\Core\Eloquent\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Facades\App\Core\Facades\AlertCustom;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$categories =Category::all();
        //$categories=Category::paginate(3);
        $categories=Category::where('name','ILIKE',"%".request()->get('filter')."%")->paginate(3);

        return view('categories.index',compact('categories'));
        //return view('categories.index')->with(['categories'=>Category::all()]);
        //$categories =Category::all();
        //return view('categories.index')->with(['categories'=>Category::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //
        //dd($request);
        //Category::create($request->aall());
        //Category::create($request->only(['name','description']));
        Category::create($request->validated());
        AlertCustom::success('Guardado Correctamente');
        return redirect()->route('categories.index');
        //return view('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Core\Eloquent\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Core\Eloquent\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Core\Eloquent\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, category $category)
    {
        //
        $category->fill($request->validated());
        $category->save();
        AlertCustom::success('Actualizado Correctamente');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Core\Eloquent\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        //
        $category->delete();
        AlertCustom::success('Eliminado Correctamente');
        return redirect()->route('categories.index');
    }
}
