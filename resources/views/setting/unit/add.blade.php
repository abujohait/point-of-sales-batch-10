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
                            <div class="col-sm-12">
                                <label for="" class="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name">
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
