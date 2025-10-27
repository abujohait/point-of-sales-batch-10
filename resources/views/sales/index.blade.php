@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline">{{ $title }}</h3>
                    <a href="{{ route('customer.create') }}" class=" float-end btn btn-success">
                        + Add New
                    </a>
                </div>
                <div class="card-body">
                    <table class="" id="datatable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Invoice No</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Total</th>
                                <th>Paid</th>
                                <th>Due</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if (count($sales) > 0)

                                @foreach ($sales as $key => $item)
                                    <tr>
                                        <td>{{ $key += 1 }}</td>
                                        <td>{{ $item->invoice??'' }}</td>
                                        <td>{{ $item->date??'' }}</td>
                                        <td>{{ $item->customer_name??'' }}</td>
                                        <td>{{ $item->total??'' }}</td>
                                        <td>{{ $item->paid??'' }}</td>
                                        <td>{{ $item->due??'' }}</td>
                                        <td>
                                            <a href="{{ route('sales.edit', $item->id) }}" class="btn btn-primary">
                                                Edit
                                            </a>

                                            <form action="{{ route('sales.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
