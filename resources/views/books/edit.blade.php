@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title m-0">Edit E-Book</h5>
                    </div>
                    <div class="card-body">
                            <form action="{{ route('book.update', ['id' => $book->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                    @if (count($errors) > 0)
                                        <ul>
                                            @foreach ($errors->all() as $item)
                                                <li>
                                                    {{ $item }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif

                                            <div class="form-group">
                                                <label for="name">Name:</label>
                                                <input type="text" name="name" id="name" class="form-control"
                                                    value="{{ $book->name }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Book Code </label>
                                                <input type="text" name="book_code" value="{{ $book->book_code }}"
                                                    class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Type </label>
                                                <input type="text" name="type" value="{{ $book->type }}"
                                                    class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Description </label>
                                                <textarea class="form-control" name="description" rows="3"> {{ $book->description }} </textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="author">Author:</label>
                                                <input type="text" name="author" id="author" class="form-control"
                                                    value="{{ $book->author }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Photo </label>
                                                <input type="file" name="photo" class="form-control">
                                            </div>

                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save"></i> Save Changes
                                            </button>
                                            <a href="{{ route('books') }}" class="btn btn-secondary">
                                                <i class="fas fa-ban"></i> Cancel
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            @endsection
