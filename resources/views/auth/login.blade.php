<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/form.css">
    <title>Lordzapp</title>
</head>
<body>
    <div class="loader">
        <h1 class="loader-title">
            <span>L</span>
            <span>O</span>
            <span>A</span>
            <span>D</span>
            <span>E</span>
            <span>R</span>
        </h1>
    </div>
    <div class="form-container">
        @if(session('login-success'))
        <div id="notification">
            <p>Success</p>
            <p>{{ session('login-success') }}</p>
        </div>
        @elseif(session('login-failed'))
        <div id="notification">
            <p>Success</p>
            <p>{{ session('login-failed') }}</p>
        </div>
        @endif
        <div class="form-container-detail login-container">
            <div class="form-container-option">
                <span class="login-fill"></span>
                <button class="toggle-btn login-header">Login</button>
            </div>
            <div class="forms-box">
                
            <form action="{{ route('login') }}" class="login" method="post">
                @csrf
                <div class="form-item">
                    <input type="text" name="phone_number" value="{{ old('phonenumber') }}" placeholder="Phone number">
                    <div class="form-item_error">
                        @error('phone_number')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-item">
                    <input type="password" name="password" placeholder="Password">
                    <div class="form-item_error">
                        @error('password')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <button type="submit" id="submit">Login<span class="slide-left"></span></button>
                <div class="redirect">
                    <a href="{{ route('register') }}">Dont have an account?</a>
                </div>
            </form>
            </div>
        </div>
    </div>
    <script src="../js/main.js"></script>
    <!-- <script src="../js/signup.js"></script> -->
</body>
</html>