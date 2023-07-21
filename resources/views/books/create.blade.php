@extends('layouts.app')

@section('content')
    @php
        $type = ['Adventure stories', 'Classics', 'Crime', 'Fairy tales, fables, and folk tales', 'Fantasy', 'Historical fiction', 'Horror', 'Humour and satire', 'Literary fiction', 'Mystery', 'Poetry', 'Plays', 'Romance', 'Science fiction', 'Short stories', 'Thrillers', 'War', 'Women’s fiction', 'Young adult', 'Autobiography and memoir', 'Biography', 'Essays', 'Non-fiction novel', 'Self-help'];
    @endphp

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title m-0">Add E-Book</h5>
                        <a href="{{ route('books') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left"></i> Back to E-Books
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    id="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="book_code">Book Code:</label>
                                <input type="text" name="book_code"
                                    class="form-control @error('book_code') is-invalid @enderror"
                                    value="{{ old('book_code') }}" id="book_code">
                                @error('book_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Type </label>
                                <select class="form-control" name="type">
                                    @foreach ($type as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea name="description" id="description" rows="5"
                                    class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="author">Author:</label>
                                <input type="text" name="author"
                                    class="form-control @error('author') is-invalid @enderror" value="{{ old('author') }}"
                                    id="author">
                                @error('author')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="photo">Image:</label>
                                <input type="file" name="photo"
                                    class="form-control-file @error('photo') is-invalid @enderror" id="photo">
                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check-circle"></i> Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
