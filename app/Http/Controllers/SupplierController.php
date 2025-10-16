<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\supplier as ModelsSupplier;
class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Supplier List';
        $data['items'] = ModelsSupplier::whereNull('deleted_at')->get();

        return view('supplier.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Create Supplier_List';
        return view('supplier.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new ModelsSupplier();
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->balance = $request->balance;
        $data->save();

        return redirect()->route('supplier.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['item'] = ModelsSupplier::find($id);
        $data['title'] = 'Edit Supplier_List';
        return view('supplier.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = ModelsSupplier::find($id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->balance = $request->balance;
        $data->save();

        return redirect()->route('supplier.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = ModelsSupplier::find($id);
        $delete->delete();

        return redirect()->route('supplier.index');
    }
}
