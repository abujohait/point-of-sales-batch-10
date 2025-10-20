@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('unit.store') }}" method="post">

                        @csrf

                        <div class="row">
                            <div class="col-sm-4">
                                <label for="" class="invoice_no">Invoice No</label>
                                <input type="text" name="invoice_no" class="form-control" id="invoice_no">
                            </div>
                            <div class="col-sm-4">
                                <label for="" class="date">Date</label>
                                <input type="date" name="date" class="form-control" id="date">
                            </div>
                            <div class="col-sm-4">
                                <label for="" class="payment_method">Payment Method</label>
                                <select name="payment_method" id="payment_method" class="form-select">
                                    <option value="bKash">bKash</option>
                                    <option value="nagad">Nagad</option>
                                    <option value="rocket">Rocket</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="" class="customer_id">Customer Name</label>
                                <select name="customer_id" id="customer_id" class="form-select customer_id">
                                    @if (count($customers) > 0)
                                        <option value="0">Select</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name??'' }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                             <div class="col-sm-4">
                                <label for="" class="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" readonly id="phone">
                            </div>
                             <div class="col-sm-4">
                                <label for="" class="address">Address</label>
                                <input type="text" readonly name="address" class="form-control" id="address">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                Item
                                            </th>
                                            <th>
                                                Qty
                                            </th>
                                            <th>
                                                Price
                                            </th>
                                            <th>
                                                Total
                                            </th>
                                            <th>
                                                <a class="btn btn-success add_row">+</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="item_grid">
                                        <tr class="item_row_1">
                                            <td>
                                                <select name="item_id" id="item_id" data-id="1" class="form-select item_id">

                                                    @if (count($products) > 0)
                                                        <option value="0">Select</option>
                                                        @foreach ($products as $product)
                                                            <option value="{{ $product->id }}">{{ $product->name??'' }}</option>
                                                        @endforeach
                                                    @endif

                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" step="any" name="qty" class="form-control qty_1">
                                            </td>
                                            <td>
                                                <input type="number" step="any" name="price" class="form-control price_1">
                                            </td>
                                            <td>
                                                <input type="number" step="any" name="total" class="form-control total_1">
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-danger">X</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                Sub Total
                                            </td>
                                            <td>
                                                <input type="number" step="any" class="form-control" name="sub_total" id="sub_total">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Discount
                                            </td>
                                            <td>
                                                <input type="number" step="any" class="form-control" name="discount" id="discount">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Total
                                            </td>
                                            <td>
                                                <input type="number" step="any" class="form-control" name="total" id="total">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Due
                                            </td>
                                            <td>
                                                <input type="number" step="any" class="form-control" name="due" id="due">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-sm-12 text-center">
                                <button class="btn btn-success" type="submit">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
            $('.customer_id').on('change', function(e){
                e.preventDefault();

                let id = $(this).val();
                let baseURl = "{{ url('/') }}";


                $.ajax({
                    url: baseURl + '/get-customer/'+id,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {

                        $('#phone').val(data.phone);
                        $('#address').val(data.address);

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX error: " + textStatus, errorThrown);
                    }
                });
            });




            $('.item_id').on('change', function(e){
                e.preventDefault();

                let id = $(this).val();

                console.log(id)

                let baseURl = "{{ url('/') }}";


                $.ajax({
                    url: baseURl + '/get-product/'+id,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {

                        $('.price_1').val(data.price);

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX error: " + textStatus, errorThrown);
                    }
                });
            });




            let i = 1;
            $('.add_row').on('click', function(){
                i++;
                $('#item_grid').append(`<tr class="item_row_${i}">
                                            <td>
                                                <select name="item_id" id="item_id" data-id="${i}" class="form-select item_id">

                                                    @if (count($products) > 0)
                                                        <option value="0">Select</option>
                                                        @foreach ($products as $product)
                                                            <option value="{{ $product->id }}">{{ $product->name??'' }}</option>
                                                        @endforeach
                                                    @endif

                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" step="any" name="qty" class="form-control qty_${i}">
                                            </td>
                                            <td>
                                                <input type="number" step="any" name="price" class="form-control price_${i}">
                                            </td>
                                            <td>
                                                <input type="number" step="any" name="total" class="form-control total_${i}">
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-danger">X</a>
                                            </td>
                                        </tr>`);



                //get item info
                $('.item_id').on('change', function(){

                    let id = $(this).val();
                    let row_no = $(this).attr('data-id');
                    let baseURl = "{{ url('/') }}";


                    $.ajax({
                        url: baseURl + '/get-product/'+id,
                        method: 'GET',
                        dataType: 'json',
                        success: function(data) {

                            $('.price_'+row_no).val(data.price);

                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error("AJAX error: " + textStatus, errorThrown);
                        }
                    });
                });





            });
    </script>
@endsection
