<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\product;
use App\Models\sale;
use App\Models\sales_det0ail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Manage Sales';

        $data['sales'] = DB::table('sales')
                                ->leftJoin('customers', 'sales.customer_id', '=', 'customers.id')
                                ->select('sales.*', 'customers.name as customer_name')
                                ->get();
        // dd($data);

        return view('sales.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Sale Entry';
        $data['customers'] = customer::whereNull('deleted_at')->get();
        $data['products'] = product::whereNull('deleted_at')->get();
        return view('sales.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            DB::transaction(function () use ($request){

                $data = new sale();
                $data->customer_id = $request->customer_id;
                $data->date = $request->date;
                $data->invoice = $request->invoice_no;
                $data->payment_method = $request->payment_method;
                $data->total = $request->sub_total;
                $data->paid = $request->total;
                $data->due = $request->due;
                $data->discount = $request->discount;
                $data->save();



                $details = $request->details;
                if(count($details) > 0){
                    foreach($details as $item){
                        $details_item = new sales_det0ail();
                        $details_item->sales_id = $data->id;
                        $details_item->product_id = $item['item_id'];
                        $details_item->QTY = $item['qty'];
                        $details_item->price = $item['price'];
                        $details_item->total = $item['total'];
                        $details_item->save();
                    }
                }
            });



        } catch (\Throwable $e) {

        }



        $notification = array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
