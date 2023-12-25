@extends('admin.layout')

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="d-flex justify-content-between flex-wrap">
                        <div class="d-flex align-items-end flex-wrap">
                            <div class="me-md-3 me-xl-5">
                                <h2>Welcome back,</h2>
                                <p class="mb-md-0">Your analytics dashboard template.</p>
                            </div>
                            <div class="d-flex">
                                <i class="mdi mdi-home text-muted hover-cursor"></i>
                                <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                                <p class="text-primary mb-0 hover-cursor">Analytics</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-end flex-wrap">
                            <button type="button" class="btn btn-light bg-white btn-icon me-3 d-none d-md-block ">
                                <i class="mdi mdi-download text-muted"></i>
                            </button>
                            <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                                <i class="mdi mdi-clock-outline text-muted"></i>
                            </button>
                            <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                                <i class="mdi mdi-plus text-muted"></i>
                            </button>
                            <button class="btn btn-primary mt-2 mt-xl-0">Generate report</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body dashboard-tabs p-0">
                            <ul class="nav nav-tabs px-4" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#overview"
                                        role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                                </li>
                            </ul>
                            <div class="tab-content py-0 px-0">
                                <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                    aria-labelledby="overview-tab">
                                    <div class="d-flex flex-wrap justify-content-xl-between">

                                        <div
                                            class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                            <i class="mdi mdi-currency-usd me-3 icon-lg text-danger"></i>
                                            <div class="d-flex flex-column justify-content-around">
                                                <small class="mb-1 text-muted">Total Financial</small>
                                                <h5 class="me-2 mb-0">${{ $totalPrice }}</h5>
                                            </div>
                                        </div>

                                        <div
                                            class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                            <i class="mdi mdi-arrow-top-right me-3 icon-lg text-primary"></i>
                                            <div class="d-flex flex-column justify-content-around">
                                                <small class="mb-1 text-muted">Revenue</small>
                                                <h5 class="me-2 mb-0">${{ $totalPrice * 0.5 }}</h5>
                                            </div>
                                        </div>
                                        <div
                                            class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                            <i class="mdi mdi-eye me-3 icon-lg text-success"></i>
                                            <div class="d-flex flex-column justify-content-around">
                                                <small class="mb-1 text-muted">Total Appointments</small>
                                                <h5 class="me-2 mb-0">{{ $appointmentCount }}</h5>
                                            </div>
                                        </div>
                                        <div
                                            class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                            <i class="mdi mdi-download me-3 icon-lg text-warning"></i>
                                            <div class="d-flex flex-column justify-content-around">
                                                <small class="mb-1 text-muted">Downloads</small>
                                                <h5 class="me-2 mb-0">2233783</h5>
                                            </div>
                                        </div>
                                        <div
                                            class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                            <i class="mdi mdi-flag me-3 icon-lg text-danger"></i>
                                            <div class="d-flex flex-column justify-content-around">
                                                <small class="mb-1 text-muted">Flagged</small>
                                                <h5 class="me-2 mb-0">3497843</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">System users</p>
                            <div class="table-responsive">
                                <table id="recent-purchases-listing" class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Role</th>
                                            <th>Permission</th>
                                            <th>Action</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ $user->address }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td>
                                                    @if ($user->permission)
                                                        <span class="text-success" style="font-weight: bold">Enabled</span>
                                                    @else
                                                        <span class="text-danger" style="font-weight: bold">Disabled</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($user->permission)
                                                        <form action="{{ route('permission', $user->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger p-2">Disable
                                                                Permission</button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('permission', $user->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success p-2">Enable
                                                                Permission</button>
                                                        </form>
                                                    @endif
                                                </td>

                                                <td>
                                                    <form action="{{ route('delete', $user->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-warning p-2"
                                                            onclick="return confirm(&quot;Confirm delete?&quot;)">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
