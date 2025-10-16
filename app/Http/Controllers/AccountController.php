<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\account as ModelsAccount;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Account List';
        $data['items'] = ModelsAccount::whereNull('deleted_at')->get();

        return view('account.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Account List';
        return view('account.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new ModelsAccount();
        $data->name = $request->name;
        $data->details = $request->details;
        $data->balance = $request->balance;
        $data->save();

        return redirect()->route('account.index');
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
        $data['item'] = ModelsAccount::find($id);
        $data['title'] = 'Edit Account_List';
        return view('account.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = ModelsAccount::find($id);
        $data->name = $request->name;
        $data->details = $request->details;
        $data->balance = $request->balance;
        $data->save();

        return redirect()->route('account.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = ModelsAccount::find($id);
        $delete->delete();

        return redirect()->route('account.index');
    }
}
