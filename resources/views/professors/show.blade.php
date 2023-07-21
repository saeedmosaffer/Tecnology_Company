@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 mx-auto">

                <div class="card">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="card-title m-0">{{ $professor->name }}</h5>
                        <a href="{{ route('professors') }}" class="btn btn-light">
                            <i class="fas fa-arrow-left"></i> Back to Professors
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ URL::asset($professor->photo) }}" class="card-img-top"
                                    alt="{{ $professor->photo }}">
                            </div>
                            <div class="col-md-8">
                                <ul class="list-group list-group-flush">
                                    <p class="card-text"> <strong>Phone No.:</strong> {{ $professor->phone_number }}</p>
                                    <p class="card-text"> <strong>Email:</strong> {{ $professor->email_address }}</p>
                                    <p class="card-text"> <strong>LinkedIn:</strong> {{ $professor->LinkedIn }}</p>
                                    <p class="card-text"> <strong>Courses taught:</strong>
                                        @foreach ($courses as $item)
                                            <label for="">{{ $item->name }}</label> ,
                                        @endforeach
                                        <br>
                                    </p>

                                    <p><strong>Created at:</strong> {{ $professor->created_at }}</p>
                                    <p><strong>Updated at:</strong> {{ $professor->updated_at->diffForhumans() }}</p>

                                    <br>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
