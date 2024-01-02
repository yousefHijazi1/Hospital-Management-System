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
                            <h4 class="card-title">Create news</h4>
                            <p class="card-description">Fill news information</p>

                            <form class="forms-sample" enctype="multipart/form-data" action="{{ route('newsStore') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-12 col-md-6 col-sm-12">
                                        <label for="name">Title</label>
                                        <input type="text" name="title" class="form-control" id="name" placeholder="Full Name" required >
                                        @error('name')
                                            <span class="text-danger"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <label>News Image</label>
                                        <div class="input-group">
                                            <div class="custom-file ">
                                                <input type="file" name="image" class="form-control file-upload-info " id="image-input">
                                                @error('image')
                                                    <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div style="display:flex">
                                    <button type="submit" class="btn btn-primary me-2 h-25" id="registerButton"  >Submit</button>
                                    <button type="reset" class="btn btn-danger h-25 "  style="margin-right:auto;">Cancel</button>
                                </div>

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
