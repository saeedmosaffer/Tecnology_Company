@extends('layouts.app')

@section('content')
    @php
        $category = ['Programming and information technology', 'Cyber security', 'Trade and marketing arts', 'Cryptocurrency trading'];
    @endphp


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title m-0">Create Course</h5>
                        <a href="{{ route('courses') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left"></i> Back to Courses
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
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
                                <label for="exampleFormControlInput1">Category </label>
                                <select class="form-control" name="category">
                                    @foreach ($category as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="hours">Hours</label>
                                <input type="text" name="hours"
                                    class="form-control @error('hours') is-invalid @enderror" value="{{ old('hours') }}"
                                    id="hours">
                                @error('hours')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" name="price"
                                    class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}"
                                    id="price">
                                @error('price')
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

                            <!-- Dropdown to select professor name -->
                            <div class="form-group">
                                <label for="professor">Professor</label>
                                <select class="form-control" id="professor" name="professor">
                                    @foreach ($professors as $professor)
                                        <option value="{{ $professor->id }}">{{ $professor->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Label to display professor id -->
                            <div class="form-group">
                                <label for="prof_id">Professor ID</label>
                                <input type="text" class="form-control" id="prof_id" name="prof_id" readonly>
                            </div>

                            <!-- JavaScript code to update professor id -->
                            <script>
                                document.getElementById('professor').addEventListener('change', function() {
                                    var professorId = this.value;
                                    document.getElementById('prof_id').value = professorId;
                                });
                            </script>

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
