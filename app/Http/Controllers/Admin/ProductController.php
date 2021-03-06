<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Illuminate\Http\Response;
     */
    public function index()
    {
        $products = Product::paginate(10);
        return response()->view('auth.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Illuminate\Http\Response;
     */
    public function create()
    {
        $categories = \App\Models\Category::get();
        $properties = \App\Models\Property::get();
        return response()->view('auth.products.form', compact('categories', 'properties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Illuminate\Http\Response;
     */
    public function store(ProductRequest $request)
    {
        $params = $request->all();

        unset($params['image']);
        if ($request->has('image')) {
            $params['image'] = $request->file('image')->store('products');
        }

        Product::create($params);
        return response()->redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $product
     * @return Illuminate\Http\Response;
     */
    public function show(Product $product)
    {
        return response()->view('auth.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Illuminate\Http\Response;
     */
    public function edit(Product $product)
    {
        $categories = Category::get();
        $properties = Property::get();
        return response()->view('auth.products.form', compact('product', 'categories', 'properties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request  $request
     * @param \App\Product $product
     * @return Illuminate\Http\Response;
     */
    public function update(ProductRequest $request, Product $product): Illuminate\Http\Response
    {
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            Storage::delete($product->image);
            $params['image'] = $request->file('image')->store('products');
        }

        foreach (['new', 'hit', 'recommend'] as $fieldName) {
            if (!isset($params[$fieldName])) {
                $params[$fieldName] = 0;
            }
        }

        $product->properties()->sync($request->property_id);

        $product->update($params);
        return response()->redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return Illuminate\Http\Response;
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->redirect()->route('products.index');
    }
}
