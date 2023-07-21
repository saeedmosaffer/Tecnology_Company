@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="container my-5">
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <i class="fas fa-user-graduate fa-3x"></i>
                                <h5 class="card-title my-3">Students</h5>
                                <p class="card-text">Manage all student information and view their records.</p>
                                <a href="{{ route('students') }}" class="btn btn-primary">
                                    <i class="fas fa-plus-circle"></i> Enter
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <i class="fas fa-chalkboard-teacher fa-3x"></i>
                                <h5 class="card-title my-3">Professors</h5>
                                <p class="card-text">Manage all professor information and view their records.</p>
                                <a href="{{ route('professors') }}" class="btn btn-primary">
                                    <i class="fas fa-plus-circle"></i> Enter
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <i class="fas fa-book fa-3x"></i>
                                <h5 class="card-title my-3">Courses</h5>
                                <p class="card-text">Manage all courses information and view the course records.</p>
                                <a href="{{ route('courses') }}" class="btn btn-primary">
                                    <i class="fas fa-plus-circle"></i> Enter
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <i class="fas fa-book-open fa-3x"></i>
                                <h5 class="card-title my-3">Library</h5>
                                <p class="card-text">Manage the electronic library and purchase books and view the books
                                    records.</p>
                                <a href="{{ route('books') }}" class="btn btn-primary">
                                    <i class="fas fa-plus-circle"></i> Enter
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
