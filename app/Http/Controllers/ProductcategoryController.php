<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product_category as ModelsProduct_Category;

class ProductcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            {
        $data['title'] = 'Unit List';
        $data['items'] = ModelsProduct_Category::whereNull('deleted_at')->get();

        return view('product_category.index')->with($data);
    }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Create Product Category';
        return view('product_category.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new ModelsProduct_Category();
        $data->name = $request->name;
        $data->save();

        return redirect()->route('product_category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['item'] = ModelsProduct_Category::find($id);
        $data['title'] = 'Edit Product Category';
        return view('product_category.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = ModelsProduct_Category::find($id);
        $data->name = $request->name;
        $data->save();

        return redirect()->route('product_category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
                $delete = ModelsProduct_Category::find($id);
        $delete->delete();

        return redirect()->route('product_category.index');
    }
}
