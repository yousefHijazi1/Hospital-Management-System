<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Registration</title>
</head>

<body>

    <div class="container mt-4 bg-light  p-5" style="border-radius: 10px" >
        <form method="POST" action="{{ route('register') }}" class="row g-3">
            @csrf
            <h3 class="title">Register</h3>

            <div class="mb-3 col-lg-6 col-md-6 col-sm-6">
                <label for="name" class="form-label">Name *</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" required placeholder="Enter your name">
                @error('name')
                    <span class="text-danger"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="mb-3 col-lg-6 col-md-6 col-sm-6">
                <label for="email" class="form-label"> Email address *</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required placeholder="Enter your e-mail address">
                @error('email')
                    <span class="text-danger"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="mb-3 col-lg-6 col-md-6 col-sm-6">
                <label for="phone" class="form-label">Phone *</label>
                <input type="number" class="form-control" name="phone" id="phone" aria-describedby="phoneHelp" required placeholder="Enter your phone number">
                @error('phone')
                    <span class="text-danger"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="mb-3 col-lg-6 col-md-6 col-sm-6 ">
                <label for="address" class="form-label">Address</label>
                <input type="tel" class="form-control" name="address" id="address" aria-describedby="addressHelp" placeholder="(optionally)">
            </div>

            <div class=" col-lg-6 col-md-6 col-sm-6">
                <label for="password" class="form-label">Password *</label>
                <input type="password" class="form-control" name="password" id="password" required placeholder="Enter strong password">
                @error('password')
                    <span class="text-danger"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class=" col-lg-6 col-md-6 col-sm-6">
                <label for="confirmPass" class="form-label">Confirm Password *</label>
                <input type="password" name="password_confirmation" class="form-control" id="confirmPass" required placeholder="Re enter your password">
                <p id="errorText"></p>
            </div>

            <div class="mb-3 col-lg-12 col-md-12 col-sm-6">
                <label for="role">Role</label>
                <select class="form-select" id="role" name="role" aria-label="Default select example">
                    <option disabled>Select your role </option>
                    <option value="general health">General health</option>
                    <option value="dental">Dental</option>
                    <option value="cardiology">Cardiology</option>
                    <option value="neurology">Neurology</option>
                    <option value="orthopaedics">Orthopaedics</option>
                </select>
            </div>

            <div class="col-4">
                <button type="submit" class="btn text-light" id="registerButton" style="background-color: #3B71CA;">Submit</button>
            </div>

            <div class="login-signup mt-2" >
                <span class="text">Already have user ?
                    <a href="{{ route('login') }}" class="text signup-link" style="color: #3B71CA">Login</a>
                </span>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
