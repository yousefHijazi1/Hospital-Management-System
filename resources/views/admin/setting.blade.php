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
                            <h4 class="card-title">Admin's Profile</h4>
                            <p class="card-description">Edit your profile</p>

                            <form class="forms-sample" enctype="multipart/form-data" action="{{ route('profileUpdate') }}"
                                method="POST">
                                {{-- @if ($errors->any())
                                    @dd($errors)
                                @endif --}}
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <label for="email">Email address</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ Auth::user()->email }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                        <label for="address">City</label>
                                        <input type="text" name="address" class="form-control" id="address" placeholder="Location" value="{{ Auth::user()->address }}">
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                        <label for="phone">Phone</label>
                                        <input type="number" name="phone" class="form-control" id="phone" placeholder="Phone" value="{{ Auth::user()->phone }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control"  placeholder="Password" required>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                        <label>File upload</label>
                                        <div class="input-group">
                                            <div class="custom-file ">
                                                <input type="file" name="image" class="form-control file-upload-info " id="image-input">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="role" value="admin">

                                <div style="display:flex">
                                    <button type="submit" class="btn btn-primary me-2 h-25"  >Submit</button>
                                    <button type="reset" class="btn btn-danger h-25 "  style="margin-right:auto;">Cancel</button>
                                    <button type="button" class="btn btn-primary  mb-4 "  data-bs-toggle="modal" data-bs-target="#modalForm">Change Password</button>
                                </div>
                            </form>

                            <!-- Modal -->
                            <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel"aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Change Password
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('changePassword') }}">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="form-label" for="old_password">Old Password</label>
                                                    <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Username" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="password">New Password</label>
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="confirmPass">Confirm Password</label>
                                                    <input type="password" name="password_confirmation" class="form-control" id="confirmPass" placeholder="Password" required>
                                                    <p id="errorText"></p>
                                                </div>

                                                <div class="modal-footer d-block">

                                                    <button type="submit" class="btn btn-primary text-light float-end" id="registerButton">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
