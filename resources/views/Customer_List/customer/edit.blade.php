@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="d-inline">{{ $title }}</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('customer.update', $item->id) }}" method="post">
                    @csrf
                    @method('PATCH')

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" value="{{ $item->name??'' }}" class="form-control" id="name" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" value="{{ $item->address??'' }}" class="form-control" id="address">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" value="{{ $item->phone??'' }}" class="form-control" id="phone">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="balance" class="form-label">Balance (+/-)</label>
                            <input type="text" name="balance" value="{{ $item->balance??'' }}" class="form-control" id="balance">
                        </div>
                    </div>

                    <div class="row pt-2">
                        <div class="col-sm-12">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

