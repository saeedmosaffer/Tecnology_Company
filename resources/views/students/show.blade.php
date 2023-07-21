@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="card-title m-0">{{ $student->name }}</h5>
                        <a href="{{ route('students') }}" class="btn btn-light">
                            <i class="fas fa-arrow-left"></i> Back to Students
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ URL::asset($student->photo) }}" class="card-img-top"
                                    alt="{{ $student->photo }}">
                            </div>
                            <div class="col-md-8">
                                <ul class="list-group list-group-flush">
                                    <p class="card-text"> <strong>ID Card:</strong> {{ $student->id_card }}</p>
                                    <p class="card-text"> <strong>Phone No.:</strong> {{ $student->phone_number }}</p>
                                    <p class="card-text"> <strong>Email:</strong> {{ $student->email_address }}</p>
                                    <p class="card-text"> <strong>Supervising Professor:</strong> {{ $student->supervisingProfessor->name }}</p>
                                    <p class="card-text"> <strong>Superviser ID:</strong> {{ $student->supervising_professor_id }}</p>
                                    <p><strong>Created at:</strong> {{ $student->created_at }}</p>
                                    <p><strong>Updated at:</strong> {{ $student->updated_at->diffForhumans() }}</p>

                                    <br>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <p>
                    <div class="col">
                        <h5 class="card-title">Participated courses:</h5>

                        <div class="col">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Course ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($courses as $item)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->id }}</td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>

                    </div>
                    </p>
                </div>


            </div>
        </div>
    @endsection
