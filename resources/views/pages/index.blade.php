<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path
            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path
            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path
            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </symbol>
</svg>
@extends('pages.layout')


@section('content')
    @if (session('add_conflict'))
        <div class="alert alert-warning d-flex align-items-center mt-3" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                <use xlink:href="#info-fill" />
            </svg>
            {{ session('add_conflict') }}&nbsp; <a href="#myForm" class="alert-link" style="text-decoration: underline"> Try
                agin with another appointment</a>
        </div>
    @endif

    @if (session('add_success'))
        <div class="alert alert-success d-flex align-items-center mt-3" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>
            {{ session('add_success') }}
        </div>
    @endif

    @if (session('add_failed'))
        <div class="alert alert-danger d-flex align-items-center mt-3" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill" />
            </svg>
            Something wrong &nbsp; <a href="#myForm" class="alert-link" style="text-decoration: underline"> Try agin</a>
        </div>
    @endif

    <div class="page-hero bg-image overlay-dark" style="background-image: url(../assets/img/bg_image_1.jpg);">
        <div class="hero-section">
            <div class="container text-center wow zoomIn">
                <span class="subhead">Let's make your life happier</span>
                <h1 class="display-4">Healthy Living</h1>
                {{-- <a href="#" class="btn btn-primary">Let's Consult</a> --}}
            </div>
        </div>
    </div>


    <div class="bg-light">
        <div class="page-section py-3 mt-md-n5 custom-index">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4 py-3 py-md-0">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-secondary text-white">
                                <span class="mai-chatbubbles-outline"></span>
                            </div>
                            <p><span>Chat</span> with a doctors</p>
                        </div>
                    </div>
                    <div class="col-md-4 py-3 py-md-0">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-accent text-white">
                                <span class="mai-basket"></span>
                            </div>
                            <p><span>One</span>-Health Pharmacy</p>
                        </div>
                    </div>
                    <div class="col-md-4 py-3 py-md-0">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-primary text-white">
                                <span class="mai-shield-checkmark"></span>
                            </div>
                            <p><span>One</span>-Health Protection</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .page-section -->

        <div class="page-section pb-0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 py-3 wow fadeInUp">
                        <h1>Welcome to Your Health <br> Center</h1>
                        <p class="text-grey mb-4">A health center is a facility that provides primary healthcare services to
                            individuals within
                            a community or region.
                            These centers play a crucial role in promoting and maintaining the health and well-being of the
                            population they serve.
                            Health centers are typically staffed by a diverse team of healthcare professionals,
                            including doctors, nurses, and support staff. They offer a wide range of services, such as
                            preventive care,
                            diagnosis and treatment of common illnesses, vaccinations, health screenings, and management of
                            chronic conditions</p>
                        <a href="{{ route('about') }}" class="btn btn-primary">Learn More</a>
                    </div>
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
                        <div class="img-place custom-img-1">
                            <img src="../assets/img/doctor.jpg" alt="" style="border-radius:10px ">
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .bg-light -->
    </div> <!-- .bg-light -->

    <div class="page-section">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>

            <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
                @foreach ($doctors as $doctor)
                    <div class="item">
                        <div class="card-doctor">
                            <div class="header">
                                <img src="images/{{ $doctor->image }}" alt="">
                                <div class="meta">
                                    <a href="#"><span class="mai-call"></span></a>
                                    <a href="#"><span class="mai-logo-whatsapp"></span></a>
                                </div>
                            </div>
                            <div class="body">
                                <p class="text-xl mb-0">Dr. {{ $doctor->name }} <span
                                        style="font-size: 13px">({{ $doctor->role }})</span> </p>
                                <span class="text-sm text-grey">{{ $doctor->specialty }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="page-section bg-light">
            <div class="container">
                <h1 class="text-center wow fadeInUp">Latest News</h1>
                <div class="row mt-5">
                    @foreach ($blogs as $blog)
                        <div class="col-lg-4 py-2 wow zoomIn">

                            <div class="card-blog">
                                <div class="header">

                                    <a href="{{ route('details') }}" class="post-thumb">
                                        <img src="images/{{ $blog->image }}" alt="">
                                    </a>
                                </div>
                                <div class="body">
                                    <h5 class="post-title"><a href="{{ route('details') }}">{{ $blog->title }}</a></h5>
                                </div>
                            </div>

                        </div>
                    @endforeach

                    {{-- <div class="col-12 text-center mt-4 wow zoomIn">
                    <a href="{{ route('blog') }}" class="btn btn-primary">Read More</a>
                </div> --}}

                </div>
            </div>
        </div> <!-- .page-section -->

        <div class="page-section">
            <div class="container">
                <h1 class="text-center wow fadeInUp" id="myForm">Make an Appointment</h1>

                <form class="main-form" method="POST" action="{{ route('appointment_store') }}" id="appointment-form">
                    @csrf
                    <div class="row mt-5 ">
                        <div class="col-lg-6 col-sm-6 py-2 wow fadeInLeft">
                            <input type="text" name="name" class="form-control" placeholder="Full name" required>
                        </div>
                        <div class="col-lg-6 col-sm-6 py-2 wow fadeInRight">
                            <input type="email" name="email" class="form-control" placeholder="Email address"
                                required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                            <input type="date" name="birthDate" min="{{ date('Y-m-d') }}" class="form-control"
                                required>
                        </div>
                        <div class="col-lg-6 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                            <select name="department" id="department" class="custom-select" required>
                                <option value="">Select a doctor</option>
                                @foreach ($doctors as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->role }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 py-2 wow fadeInUp" data-wow-delay="300ms">
                            <input type="number" name="phone" class="form-control" placeholder="Phone number"
                                required>
                        </div>
                        <div class="col-lg-6 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                            <select name="appointment-time" id="appointment-time" class="custom-select" required>
                                <option value=""> Select doctor first</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                            <textarea name="message" id="message" class="form-control" rows="6"
                                placeholder="Enter a message (optional)"></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit</button>
                </form>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

                <script>
                    $(document).ready(function() {
                        $('#department').change(function() {
                            var userId = $(this).val(); // Get the selected user ID

                            // Make an AJAX request to fetch the doctor's time slots
                            $.ajax({
                                url: '/get-doctor-timeslots/' + userId,
                                type: 'GET',
                                success: function(response) {
                                    // Clear previous options
                                    $('#appointment-time').empty();

                                    if (response.length > 0) {
                                        var startTime = response[0].start_time;
                                        var endTime = response[0].end_time;

                                        // Convert start_time and end_time to moment.js objects
                                        var startMoment = moment(startTime, 'HH:mm:ss');
                                        var endMoment = moment(endTime, 'HH:mm:ss');

                                        // Generate time slots in half-hour intervals
                                        var currentMoment = startMoment.clone();
                                        while (currentMoment.isSameOrBefore(endMoment)) {
                                            var optionText = currentMoment.format('HH:mm');
                                            var optionValue = currentMoment.format('HH:mm:ss');
                                            var option = '<option value="' + optionValue + '">' +
                                                optionText + '</option>';
                                            $('#appointment-time').append(option);

                                            currentMoment.add(30, 'minutes'); // Add 30 minutes
                                        }
                                    } else {
                                        // If no time slots available, display a message
                                        var option = '<option value="">No available time slots</option>';
                                        $('#appointment-time').append(option);
                                    }
                                }
                            });
                        });
                    });
                </script>
            </div>
        </div> <!-- .page-section -->

        <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>

        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

        <script src="{{ asset('assets/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

        <script src="{{ asset('assets/vendor/wow/wow.min.js') }}"></script>

        <script src="{{ asset('assets/js/theme.js') }}"></script>

    @endsection
