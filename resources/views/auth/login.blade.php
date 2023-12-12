<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="{{ asset('style/auth.css') }}">

    <title>Login</title>
</head>
<body>

    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-field">
                        <input type="email" name="email" placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" id="password" class="password" placeholder="Enter your password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw" onclick="showPassword()"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>

                        <a href="#" class="text" >Forgot password?</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Login">
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger " style="margin-top: 10px">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <strong style="color: red">{{ $error }}</strong>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="{{ route('register') }}" class="text signup-link">Signup Now</a>
                    </span>
                </div>
            </div>



        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
