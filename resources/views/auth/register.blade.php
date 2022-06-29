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
        @if(session('status_landlord'))
        <div id="notification">
            <p>Success</p>
            <p>{{ session('status_landlord') }}</p>
        </div>
        @elseif(session('status_tenant'))
        <div id="notification">
            <p>Success</p>
            <p>{{ session('status_tenant') }}</p>
        </div>
        @endif
        <div class="form-container-detail">
            <div class="form-container-option">
                <span id="slider"></span>
                <button class="toggle-btn">Land Lord</button>
                <button class="toggle-btn">Tenant</button>
            </div>
            
            <div class="forms-box">
                <!-- Landlord form -->
            <form action="{{ route('register.landlord') }}" class="landlord" method="post">
                @csrf
                <div class="form-item">
                    <input type="text" name="firstname" value="{{ old('firstname') }}" placeholder="First name">
                    <div class="form-item_error">
                        @error('firstname')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-item">
                    <input type="text" name="lastname" value="{{ old('lastname') }}" placeholder="Last name">
                    <div class="form-item_error">
                        @error('lastname')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-item">
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="E-mail">
                    
                    <div class="form-item_error">
                        @error('email')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-item">
                    <input type="text" name="phonenumber" value="{{ old('phonenumber') }}" placeholder="Phone number">
                    <div class="form-item_error">
                        @error('phonenumber')
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
                <div class="form-item">
                    <input type="password" name="password_confirmation" placeholder="Password confirm">
                    <div class="form-item_error">
                        @error('password_confirmation')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <button type="submit" name="landlord" id="submit">Register<span class="slide-left"></span></button>
                <div class="redirect">
                    <a href="{{ route('login') }}">Do you have an account?</a>
                </div>
            </form>
            <!-- Tenant form -->
            <form action="{{ route('register.tenant') }}" class="tenant" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-item">
                    <input type="text" name="firstname" value="{{ old('firstname') }}" placeholder="First name">
                    <div class="form-item_error">
                        @error('firstname')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-item">
                    <input type="text" name="lastname" value="{{ old('lastname') }}" placeholder="Last name">
                    <div class="form-item_error">
                        @error('lastname')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-item">
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="E-mail">
                    
                    <div class="form-item_error">
                        @error('email')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-item">
                    <input type="text" name="phonenumber" value="{{ old('phonenumber') }}" placeholder="+256xxxxxxx">
                    <div class="form-item_error">
                        @error('phonenumber')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-item">
                    <input type="file" name="avatar" id="file">
                    <label for="file">
                        Choose your avatar
                    </label>
                    <div class="form-item_error">
                        @error('avatar')
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
                <div class="form-item">
                    <input type="password" name="password_confirmation" placeholder="Password confirm">
                    <div class="form-item_error">
                        @error('password_confirmation')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <button type="submit" name="tenant" id="submit">Register<span class="slide-left"></span></button>
                <div class="redirect">
                    <a href="{{ route('login') }}">Do you have an account?</a>
                </div>
            </form>
            </div>
            
        </div>
    </div>
    <script src="../js/main.js"></script>
    <script src="../js/signup.js"></script>
</body>
</html>