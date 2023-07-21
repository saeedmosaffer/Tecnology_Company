@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title m-0">E-Books</h5>
                        <a
                        href="{{ route('book.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> Add E-Book
                        </a>

                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Author</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $library)
                                    <tr>
                                        <td>{{ $library->id }}</td>
                                        <td>{{ $library->name }}</td>
                                        <td>{{ $library->author }}</td>
                                        <td class="d-flex justify-content-around">
                                            <a href="{{ route('book.show', $library->id) }}" class="btn btn-primary">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            <a href="{{ route('book.edit', $library->id) }}" class="btn btn-warning">
                                                <i class="fas fa-pencil-alt"></i> Edit
                                            </a>
                                            <form action="{{ route('book.destroy', $library->id) }}" method="POST" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('books.trashed') }}" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Trash
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
