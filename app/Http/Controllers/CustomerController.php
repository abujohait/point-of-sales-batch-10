<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer as ModelsCustomer;
use SebastianBergmann\CodeCoverage\Report\Html\CustomCssFile;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Customer List';
        $data['items'] = ModelsCustomer::whereNull('deleted_at')->get();

        return view('Customer_List\customer.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Create customer';
        return view('Customer_List.customer.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new ModelsCustomer();
        $data->name = $request->name;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->balance = $request->balance;
        $data->save();

        return redirect()->route('customer.index');
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
        $data['item'] = ModelsCustomer::find($id);
        $data['title'] = 'Edit Customer';
        return view('Customer_List.customer.edit')->with($data);
        dd($data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = ModelsCustomer::find($id);
        $data->name = $request->name;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->balance = $request->balance;
        $data->save();

        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = ModelsCustomer::find($id);
        $delete->delete();

        return redirect()->route('customer.index');
    }



    public function getCustomer($id){
        $data = ModelsCustomer::where('id', $id)->first();

        return response()->json($data);
    }
}
