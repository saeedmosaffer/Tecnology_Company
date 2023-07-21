@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title m-0">All Professors</h5>
                        <a href="{{ route('professor.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> Add Professor
                        </a>

                    </div>
                    <div class="card-body">
                        @if ($professors->count() > 0)
                            <div class="col">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col"> Date</th>
                                            <th scope="col">Photo</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($professors as $item)
                                            <tr>
                                                <th scope="row">{{ $i++ }}</th>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->created_at->diffForhumans() }}</td>
                                                <td>
                                                    <img src="{{ URL::asset($item->photo) }}" alt="{{ $item->photo }}"
                                                        {{-- <img src="{{$item->photo}}" alt="{{$item->photo}}" --}} class="img-tumbnail" width="100"
                                                        height="100">
                                                </td>
                                                <td>
                                                    <a class="text-success"
                                                        href="{{ route('professor.show', ['slug' => $item->slug]) }}"> <i
                                                            class="fas  fa-2x fa-eye"></i> </a>
                                                    @if ($item->user_id == Auth::id())
                                                        &nbsp;&nbsp;
                                                        <a href="{{ route('professor.edit', ['id' => $item->id]) }}"> <i
                                                                class="fas fa-2x fa-edit"></i> </a>&nbsp;&nbsp;
                                                        <a class="text-danger"
                                                            href="{{ route('professor.destroy', ['id' => $item->id]) }}"> <i
                                                                class="fas  fa-2x fa-trash-alt"></i> </a>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>


                            </div>
                        @else
                            <div class="col">
                                <div class="alert alert-danger" role="alert">
                                    Not Professor
                                </div>
                            </div>
                        @endif
                        <a href="{{ route('professors.trashed') }}" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Trash
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
