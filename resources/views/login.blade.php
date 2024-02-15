
@extends('layouts.main')

@section('title', 'Login')

<head>
    <!-- Other head content -->
    {{-- <link href="{{ asset('css/carousel-style.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/list-opd.css') }}" rel="stylesheet">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins&amp;display=swap'>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="username">{{ __('Username') }}</label>
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}



<body>
    <!-- partial:index.partial.html -->
    <div class="wrapper">
    <div class="login_box">
        <div class="login-header">
        <span>Login</span>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input_box">
                <input id="username" type="text" class="input-field @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                <label for="username" class="label">Username</label>
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <i class="bx bx-user icon"></i>
            </div>

            <div class="input_box">
                <input id="password" type="password" class="input-field @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <label for="password" class="label">Password</label>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <i class="bx bx-lock-alt icon"></i>
            </div>

            {{-- <div class="remember-forgot">
            <div class="remember-me">
                <input type="checkbox" id="remember">
                <label for="remember">Remember me</label>
            </div>

            <div class="forgot">
                <a href="#">Forgot password?</a>
            </div>
            </div> --}}

            <div class="input_box">
                <button type="submit" class="input-submit">
                    {{ __('Login') }}
                </button>
            </div>

            {{-- <div class="register">
            <span>Don't have an account? <a href="#">Register</a></span>
            </div> --}}
        </div>
        </div>
    <!-- partial -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
    var inputElements = document.querySelectorAll('.input-field');

    inputElements.forEach(function(input) {
        // Set a placeholder value if the input has a value on page load
        if (input.value !== '') {
            input.placeholder = ' '; // Set to a space to trigger :not(:placeholder-shown)
        }

        // Add an event listener for when the input gains focus
        input.addEventListener('focus', function() {
            this.placeholder = ' '; // Set to a space to trigger :not(:placeholder-shown)
        });

        // Add an event listener for when the input loses focus
        input.addEventListener('blur', function() {
            if (this.value === '') {
                this.placeholder = ''; // Reset placeholder
            }
        });
    });
});

    
</script>

@endsection