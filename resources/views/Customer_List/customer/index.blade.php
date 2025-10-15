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
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Balance</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if (count($items) > 0)

                                @foreach ($items as $key => $item)
                                    <tr>
                                        <td>{{ $key += 1 }}</td>
                                        <td>{{ $item->name??'' }}</td>
                                        <td>{{ $item->address??'' }}</td>
                                        <td>{{ $item->phone??'' }}</td>
                                        <td>{{ $item->balance??'' }}</td>
                                        <td>
                                            <a href="{{ route('customer.edit', $item->id) }}" class="btn btn-primary">
                                                Edit
                                            </a>

                                            <form action="{{ route('customer.destroy', $item->id) }}" method="post">
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