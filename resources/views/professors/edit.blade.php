@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title m-0">Edit Professor</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('professor.update', ['id' => $professor->id]) }}" method="POST"
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
                                <form action="{{ route('professor.update', ['id' => $professor->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Name </label>
                                        <input type="text" name="name" value="{{ $professor->name }}"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">ID Card </label>
                                        <input type="text" name="id_card" value="{{ $professor->id_card }}"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Gender </label>
                                        <input type="text" name="gender" value="{{ $professor->gender }}"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Country </label>
                                        <input type="text" name="country" value="{{ $professor->country }}"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">City </label>
                                        <input type="text" name="city" value="{{ $professor->city }}"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Date of Birth </label>
                                        <input type="text" name="date_of_birth" value="{{ $professor->date_of_birth }}"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Phone No. </label>
                                        <input type="text" name="phone_number" value="{{ $professor->phone_number }}"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Email </label>
                                        <input type="text" name="email_address" value="{{ $professor->email_address }}"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Experience </label>
                                        <input type="text" name="experience" value="{{ $professor->experience }}"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">LinkedIn </label>
                                        <input type="text" name="LinkedIn" value="{{ $professor->LinkedIn }}"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Photo </label>
                                        <input type="file" name="photo" class="form-control">
                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Save Changes
                                    </button>
                                    <a href="{{ route('professors') }}" class="btn btn-secondary">
                                        <i class="fas fa-ban"></i> Cancel
                                    </a>


                                </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
