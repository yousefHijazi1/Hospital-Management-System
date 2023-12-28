@extends('admin.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">

            @if(session('success'))
                <div class="alert alert-primary" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('edit_failed'))
                <div class="alert alert-danger" role="alert">
                    {{ session('edit_failed') }}
                </div>
            @endif

            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Create doctor user</h4>
                            <p class="card-description">Fill the user information</p>

                            <form class="forms-sample" enctype="multipart/form-data" action="{{ route('userCreate') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label for="name">Full Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Full Name" required >
                                        @error('name')
                                            <span class="text-danger"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label for="email">Email address</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required >
                                        @error('email')
                                            <span class="text-danger"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                        <label for="address">City</label>
                                        <input type="text" name="address" class="form-control" id="address" placeholder="Location" required>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                        <label for="phone">Phone</label>
                                        <input type="number" name="phone" class="form-control" id="phone" placeholder="Phone" required >
                                        @error('phone')
                                            <span class="text-danger"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                        <label>Password</label>
                                        <input type="password" name="password" id="password" class="form-control"  placeholder="Password" required>
                                        @error('password')
                                            <span class="text-danger"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                        <label>Confirm Password</label>
                                        <input type="password" name="password_confirmation" id="confirmPass" class="form-control"  placeholder="Confirm Password" required>
                                        <p id="errorText"></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-3 col-md-12 col-sm-12">
                                        <label>Start Time</label>
                                        <input type="time" name="start_time" class="form-control"  placeholder="Password" required>
                                        @error('start_time')
                                            <span class="text-danger"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-3 col-md-12 col-sm-12">
                                        <label>End Time</label>
                                        <input type="time" name="end_time" class="form-control"  placeholder="Password" required>
                                        @error('end_time')
                                            <span class="text-danger"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-3 col-md-12 col-sm-12">
                                        <label>Doctor Image</label>
                                        <div class="input-group">
                                            <div class="custom-file ">
                                                <input type="file" name="image" class="form-control file-upload-info " id="image-input">
                                                @error('image')
                                                    <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-3 col-md-12 col-sm-12">
                                        <label for="role">Role</label>
                                            <select name="role" class="form-control" id="role" style="height: 43px">
                                                <option disabled>Select user role</option>
                                                <option value="general health">General Health</option>
                                                <option value="dental">Dental</option>
                                                <option value="neurology">Neurology</option>
                                                <option value="cardiology">Cardiology</option>
                                                <option value="orthopaedics">Orthopaedics</option>
                                            </select>
                                    </div>
                                </div>

                                <div style="display:flex">
                                    <button type="submit" class="btn btn-primary me-2 h-25" id="registerButton"  >Submit</button>
                                    <button type="reset" class="btn btn-danger h-25 "  style="margin-right:auto;">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
@endsection
