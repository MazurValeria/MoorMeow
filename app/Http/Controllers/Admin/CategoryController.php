<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return response()->view('auth.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('auth.categories.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            $params['image'] = $request->file('image')->store('categories');
        }

        Category::create($params);
        return response()->redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Category $category
     * @return Response
     */
    public function show(Category $category)
    {
        return response()->view('auth.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Category $category
     * @return Response
     */
    public function edit(Category $category)
    {
        return response()->view('auth.categories.form', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param \App\Category $category
     * @return Response
     */
    public function update(CategoryRequest $request, Category $category): Response
    {
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            Storage::delete($category->image);
            $params['image'] = $request->file('image')->store('categories');
        }

        $category->update($params);
        return response()->redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Category $category
     * @return Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->redirect()->route('categories.index');
    }
}
