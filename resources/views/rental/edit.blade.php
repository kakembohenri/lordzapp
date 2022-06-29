<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <title>Add Rental</title>
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
    <div class="company-logo company-logo_dashboard">
        <a href="#"><img src="{{ asset('images/company-logo1.png') }}" alt="company-logo"></a>
        <p>LordzApp &copy; 2022</p>
    </div>

    <div class="navbar-vertical">
        <ul class="navbar-vertical-items ">
            <li class="navbar-vertical-item">
                <a href="{{ route('landlord') }}">
                    <img src="{{ asset('images/home1.png') }}" alt="icon" class="icon">
                    <span>Home</span>
                </a>
            </li>
            <li class="navbar-vertical-item">
                <a href="{{ route('rental') }}">
                    <img src="{{ asset('images/rental1.png') }}" alt="icon" class="icon">
                    <span>Rentals</span>
                </a>
            </li>
            <li class="navbar-vertical-item">
                <a href="{{ route('tenants.view') }}">
                    <img src="{{ asset('images/tenants1.png') }}" alt="icon" class="icon">
                    <span>Tenants</span>
                </a>
            </li>
            <li class="navbar-vertical-item">
                <a href="{{ route('history') }}">
                    <img src="{{ asset('images/history1.png') }}" alt="icon" class="icon">
                    <span>Bills History</span>
                </a>
            </li>
            <li class="navbar-vertical-item">
                <a href="{{ asset('images/rent-due2.png') }}">
                    <img src="{{ asset('images/rent-due2.png') }}" alt="icon" class="icon">
                    <span>Rent Due: @if(auth()->user()->landlord->bill->count() > 0)<span id="count">{{ auth()->user()->landlord->bill->where('status', 'unpaid')->count() }}</span>@endif</span>
                </a>
            </li>
            <li class="navbar-vertical-item">
                <a href="#">
                    <img src="{{ asset('images/settings1.png') }}" alt="icon" class="icon">
                    <span>Settings</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-contacts">
            <li><a href="#">
                <img src="{{ asset('images/fb.jpeg') }}" >
            </a></li>
            <li><a href="#">
                <img src="{{ asset('images/twitter.png') }}">
            </a></li>
            <li><a href="#">
                <img src="{{ asset('images/insta.png') }}">
            </a></li>
        </ul>
        
        <div class="navbar-adjust">
            <span></span>
            <span></span>
        </div>
    </div>

        <div class="form-container-detail add-rent_form">
            <div class="form-title">
                <h3>Edit Rental</h3>
            </div>
            <div class="forms-box">
                <!-- Landlord form -->
            <form action="{{ route('edit.rental', ['rental' => $rental]) }}" class="landlord" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-item">
                    <input type="text" name="name" value="{{ $rental->name }}" placeholder="Name">
                    <div class="form-item_error">
                        @error('name')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-item">
                    <input type="text" name="location" value="{{ $rental->location }}" placeholder="Location">
                    <div class="form-item_error">
                        @error('location')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-item">
                    <input type="number" name="rent" value="{{ $rental->rent }}" placeholder="Rent">
                    <div class="form-item_error">
                        @error('rent')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                {{-- <div class="form-item">
                    <input type="file" id="file" name="avatar" value="{{ $rental->avatar }}">
                    <label for="file">
                        Edit image of your rental
                    </label>
                    <div class="form-item_error">
                        @error('avatar')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div> --}}
                <button type="submit" id="submit">Edit<span class="slide-left"></span></button>
            </form>
            
    <!-- </div> -->
</body>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
</html>