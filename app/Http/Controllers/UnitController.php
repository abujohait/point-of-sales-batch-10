<?php

namespace App\Http\Controllers;

use App\Models\unit as ModelsUnit;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Unit List';
        $data['items'] = ModelsUnit::whereNull('deleted_at')->get();

        return view('setting.unit.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Create Unit';
        return view('setting.unit.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new ModelsUnit();
        $data->name = $request->name;
        $data->save();

        return redirect()->route('unit.index');
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
        $data['item'] = ModelsUnit::find($id);
        $data['title'] = 'Edit Unit';
        return view('setting.unit.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = ModelsUnit::find($id);
        $data->name = $request->name;
        $data->save();

        return redirect()->route('unit.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = ModelsUnit::find($id);
        $delete->delete();

        return redirect()->route('unit.index');
    }
}
