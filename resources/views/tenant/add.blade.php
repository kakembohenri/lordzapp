<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rental.css') }}">
    <title>LordzApp</title>
</head>
<body>
    @if(session('rental_status'))
    <div id="notification">
        <p>{{ session('rental_status') }}</p>
    </div>
    @endif
    @if(session('edit_status'))
    <div id="notification">
        <p>{{ session('edit_status') }}</p>
    </div>
    @endif
    {{-- <style>
        
    </style> --}}
    <div class="loader">
        <h1 class="loader-title">
            <span>L</span>
            <span>O</span>
            <span>R</span>
            <span>D</span>
            <span>Z</span>
            
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
                <a href="#">
                    <img src="{{ asset('images/history1.png') }}" alt="icon" class="icon">
                    <span>Bills History</span>
                </a>
            </li>
            <li class="navbar-vertical-item">
                <a href="#">
                    <img src="{{ asset('images/rent-due2.png') }}" alt="icon" class="icon">
                    <span>Rent Due</span>
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
    <div class="dashboard-container">
        <div class="dashboard-welcome dashboard-others">
            <h3>Add tenants to rental: <strong>{{ $rental->name }}</strong></h3>
            <form action="{{ route('add.tenant', ['rental' => $rental]) }}" class="search" method="get">
                @csrf
                <input type="text" name="search" value="{{ request()->query('search') }}" class="search" placeholder="Search tenants...">
            </form>
            <a href="{{ route('tenants.view') }}" id="add">
                <button type="button" id="submit">Back<span class="slide-left"></span></button>
            </a>
        </div>
        <div class="dashboard-items dashboard-items_others">
            @if(request()->query('search'))
            @if($users->count() > 0)
            @foreach($users as $user)
            @if($user->tenant)
            @if(!$user->tenant->rental_id)
            <h3>Search results for user <strong>"{{ request()->query('search') }}"</strong></h3>
            <div class="dashboard-item dashboard-item_others">
                <img src="{{ asset('img/' . $user->avatar) }}" alt="" class="dashboard-others_icon">
                <div class="dashboard-others_details ">
                    <span>Name: <strong>{{ $user->first_name }} {{ $user->last_name }}</strong></span>
                    <span>Contact: <strong>{{ $user->phone_number }}</strong></span>
                </div>
                <form action="{{ route('update.tenant', ['user' => $user, 'rental' => $rental]) }}" class="add" method="post">
                    @csrf
                    <button type="submit" id="submit">Add<span class="slide-left"></span></button>
                </form>
            </div>
            @else
            <h3>User already has a rental</h3>
            @endif
            @else
            <h3>User is not a tenant</h3>
            @endif
            @endforeach
            @else
            <h3>User <strong>"{{ request()->query('search') }}"</strong> was not found</h3>
            @endif
            @endif
        </div>
    </div>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>