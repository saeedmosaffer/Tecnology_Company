@extends('layouts.app')

    @section('content')
        <div class="container my-5">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <h5 class="card-title m-0">{{ $course->name }}</h5>
                            <a href="{{ route('courses') }}" class="btn btn-light">
                                <i class="fas fa-arrow-left"></i> Back to Courses
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ URL::asset($course->photo) }}" class="card-img-top"
                                        alt="{{ $course->photo }}">
                                </div>
                                <div class="col-md-8">
                                    <ul class="list-group list-group-flush">
                                        <p class="card-text"> <strong>Category:</strong> {{ $course->category }}</p>
                                        <p class="card-text">
                                            @foreach ($professors as $item)
                                                <?php
                                                if ($course->prof_id == $item->id) {
                                                    echo " <strong>Professor Name:</strong> {$item->name}";
                                                }
                                                ?>
                                            @endforeach
                                        </p>

                                        <p class="card-text"> <strong>Description:</strong> {{ $course->description }}</p>
                                        <p><strong>Created at:</strong>  {{ $course->created_at }}</p>
                                        <p><strong>Updated at:</strong>  {{ $course->updated_at->diffForhumans() }}</p>

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
