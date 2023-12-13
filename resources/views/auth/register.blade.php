<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="{{ asset('style/auth.css') }}">

    <title>Registration</title>
</head>

<body>

    <div class="container p-4">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h2 class="title">Register</h2>

            <div class="mb-3">
                <label for="name" class="form-label">Name *</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" required>
                @error('name')
                    <span class="text-danger"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label"> Email address *</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
                @error('email')
                    <span class="text-danger"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone *</label>
                <input type="tel" class="form-control" name="phone" id="phone" aria-describedby="phoneHelp" required>
                @error('phone')
                    <span class="text-danger"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="tel" class="form-control" name="address" id="address" aria-describedby="addressHelp">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password *</label>
                <input type="password" class="form-control" name="password" id="password" required>
                @error('password')
                    <span class="text-danger"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="confirmPass" class="form-label">Confirm Password *</label>
                <input type="password" name="password_confirmation" class="form-control" id="confirmPass" required>
                <p id="errorText"></p>
            </div>

            <button type="submit" class="btn text-light" id="registerButton" style="background-color: #06c706">Submit</button>
           
        </form>
        <div class="login-signup mt-2">
            <span class="text">Already have user ?
                <a href="{{ route('login') }}" class="text signup-link" style="color: #06c706">Login</a>
            </span>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>