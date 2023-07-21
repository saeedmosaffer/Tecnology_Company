@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="card-title m-0">{{ $book->name }}</h5>
                        <a href="{{ route('books') }}" class="btn btn-light">
                            <i class="fas fa-arrow-left"></i> Back to E-Books
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{URL::asset($book->photo)}}" class="card-img-top" alt="{{$book->photo}}">
                            </div>
                            <div class="col-md-8">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <strong>Author:</strong> {{ $book->author }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Type:</strong> {{ $book->type }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Book Code:</strong> {{ $book->code }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Description:</strong> {{ $book->description }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


