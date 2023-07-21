@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title m-0">Edit Course</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('course.update', ['id' => $course->id]) }}" method="POST"
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

                            <div class="col">
                                <form action="{{ route('course.update', ['id' => $course->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Name </label>
                                        <input type="text" name="name" value="{{ $course->name }}"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Category </label>
                                        <input type="text" name="category" value="{{ $course->category }}"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Hours </label>
                                        <input type="text" name="hours" value="{{ $course->hours }}"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Price </label>
                                        <input type="text" name="price" value="{{ $course->price }}"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Description </label>
                                        <textarea class="form-control" name="description" rows="3"> {{ $course->description }} </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1"> Professor Name </label>
                                        <select class="form-control" name="prof_id">
                                            @foreach ($professors as $item)
                                                <option value="{{ $item->id }}">
                                                    <label for="">{{ $item->name }}</label>
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Photo </label>
                                        <input type="file" name="photo" class="form-control">
                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Save Changes
                                    </button>
                                    <a href="{{ route('courses') }}" class="btn btn-secondary">
                                        <i class="fas fa-ban"></i> Cancel
                                    </a>

                                </form></form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    @endsection
