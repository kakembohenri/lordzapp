<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rental.css') }}">
    <title>Rental</title>
</head>
<body>
    @if(session('rental_status'))
    <div id="notification">
        <p>{{ session('rental_status') }}</p>
    </div>
    @endif
    @if(session('success'))
    <div id="notification">
        <p>{{ session('success') }}</p>
    </div>
    @endif
    @if(session('edit_status'))
    <div id="notification">
        <p>{{ session('edit_status') }}</p>
    </div>
    @endif
    <div class="loader">
        <h1 class="loader-title">
            <span>L</span>
            <span>O</span>
            <span>R</span>
            <span>D</span>
            <span>Z</span>
            {{-- <span>R</span> --}}
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
            {{-- <li class="navbar-vertical-item">
                <a href="{{ asset('images/rent-due2.png') }}">
                    <img src="{{ asset('images/rent-due2.png') }}" alt="icon" class="icon">
                    <span>Rent Due 
                        @if(auth()->user()->landlord)
                        @if(auth()->user()->landlord->bill->count() > 0)
                        <span id="count">{{ auth()->user()->landlord->bill->where('status', 'unpaid')->count() }}
                        </span>
                        @endif
                        @endif
                    </span>
                </a>
            </li> --}}
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
            <h3>My Rentals: {{ $myRentals->count() }}</h3>
            <form action="#" class="search">
                <input type="text" class="search" placeholder="Filter...">
            </form>
            <a href="{{ route('add.rental') }}" id="add">
                <button type="submit" id="submit">Add Rental<span class="slide-left"></span></button>
            </a>
        </div>
        <div class="dashboard-items dashboard-items_others">
            @if(!$myRentals->count() > 0)
            <h3>You dont have any listed rental properties</h3>
            @else
            @foreach($myRentals as $myRental)
            <div class="dashboard-item dashboard-item_others">
                <img src="{{ asset('img/' . $myRental->avatar) }}" alt="" class="dashboard-others_icon">
                <div class="dashboard-others_details ">
                    <span>Name: {{ $myRental->name }}</span>
                    {{-- <span>Number of units:<a href="#">{{ $myRental->units }}</a></span> --}}
                    <span>Location: <strong>{{ $myRental->location }}</strong></span>
                    <span>Rent: <strong>{{ $myRental->rent }} shillings</strong></span>
                    <span>Number of tenants: <strong>{{ $myRental->tenant->count() }}</strong></span>
                </div>
                <a href="{{ route('edit.rental', ['rental' => $myRental]) }}" id="edit">
                    <button type="submit" id="submit">Edit Rental<span class="slide-left"></span></button>
                </a>
                <a href="{{ route('add.tenant', ['rental' => $myRental]) }}" id="add">
                    <button type="button" id="submit">Add tenant<span class="slide-left"></span></button>
                </a>
            </div>
            @endforeach
            @endif
            
        </div>
    </div>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>