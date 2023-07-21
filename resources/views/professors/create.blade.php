@extends('layouts.app')

@section('content')
    @php
        $genderArray = ['Male', 'Female'];
        $countryArray = ['Palestine', 'Jordan'];
        $provinceArray = ['Ramallah', 'Nablus', 'Jenen', 'Tubas', 'Salfet', 'Jereco'];
    @endphp


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title m-0">Create Professor</h5>
                        <a href="{{ route('professors') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left"></i> Back to professors
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('professor.store') }}" method="POST" enctype="multipart/form-data">
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
                                <label for="id_card">ID Card</label>
                                <input type="text" name="id_card"
                                    class="form-control @error('id_card') is-invalid @enderror" value="{{ old('id_card') }}"
                                    id="id_card">
                                @error('id_card')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1"> Gender </label>
                                <select class="form-control" name="gender">
                                    @foreach ($genderArray as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1"> Country </label>
                                <select class="form-control" name="country">
                                    @foreach ($countryArray as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1"> City </label>
                                <select class="form-control" name="city">
                                    @foreach ($provinceArray as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="date_of_birth">Date of Birth</label>
                                <input type="text" name="date_of_birth"
                                    class="form-control @error('date_of_birth') is-invalid @enderror" value="{{ old('date_of_birth') }}"
                                    id="date_of_birth">
                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Phone No.</label>
                                <input type="text" name="phone_number"
                                    class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}"
                                    id="phone_number">
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email_address">Email</label>
                                <input type="text" name="email_address"
                                    class="form-control @error('email_address') is-invalid @enderror" value="{{ old('email_address') }}"
                                    id="email_address">
                                @error('email_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="experience">Experience</label>
                                <input type="text" name="experience"
                                    class="form-control @error('experience') is-invalid @enderror" value="{{ old('experience') }}"
                                    id="experience">
                                @error('experience')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="LinkedIn">LinkedIn</label>
                                <input type="text" name="LinkedIn"
                                    class="form-control @error('LinkedIn') is-invalid @enderror" value="{{ old('LinkedIn') }}"
                                    id="LinkedIn">
                                @error('LinkedIn')
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
