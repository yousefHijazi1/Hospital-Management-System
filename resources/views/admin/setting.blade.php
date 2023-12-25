@extends('admin.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Admin's Profile</h4>
                            <p class="card-description">Edit your info</p>

                            <form class="forms-sample" enctype="multipart/form-data" action="{{ route('profileUpdate',Auth::user()->id) }}" method="POST">
                                @if ($errors->any())
                                    @dd($errors)
                                @endif
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label for="na,e">Name</label>
                                        <input type="text" name="name" class="form-control" id="na,e" placeholder="Name" value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label for="email">Email address</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ Auth::user()->email }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-4 col-md-12 col-sm-12">
                                        <label for="address">City</label>
                                        <input type="text" name="address" class="form-control" id="address" placeholder="Location" value="{{ Auth::user()->address }}">
                                    </div>
                                    <div class="form-group col-lg-4 col-md-12 col-sm-12">
                                        <label>File upload</label>
                                        <div class="input-group">
                                            <div class="custom-file ">
                                                <input type="file" name="image" class="form-control file-upload-info " id="image-input">
                                                {{-- <label class="custom-file-label" for="image-input">Choose file</label> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-12 col-sm-12">
                                        <label for="phone">Phone</label>
                                        <input type="number" name="phone" class="form-control" id="phone" placeholder="Phone" value="{{ Auth::user()->phone }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="confirmPass">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" id="confirmPass" placeholder="Password" required>
                                        <p id="errorText"></p>
                                    </div>
                                </div>

                                <input type="hidden" name="role" value="admin">

                                <button type="submit" class="btn btn-primary me-2" id="registerButton">Submit</button>
                                <button class="btn btn-danger">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/script.js') }}"></script>

@endsection
