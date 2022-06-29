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
    <style>
        a.add{
            margin: 1rem 0rem;
            color: violet;
            text-decoration: none;
            color: rgba(0,0,0,0.7);
        }

        a.add:hover{
            text-decoration: underline;
            color: purple;
        }
    </style>
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
    <div class="dashboard-container">
        <div class="dashboard-welcome dashboard-others">
            <h3>Tenants</h3>
            <form action="#" class="search">
                <input type="text" class="search" placeholder="Filter...">
            </form>
            <a href="{{ route('rental') }}" id="add">
                <button type="button" id="submit">Add tenant<span class="slide-left"></span></button>
            </a>
        </div>
        <div class="dashboard-items dashboard-items_others">
            @if($rentals->count() > 0)
            @foreach($rentals as $rental)
            @if($rental->tenant->count() > 0)
            @foreach($rental->tenant as $tenant)
            <div class="dashboard-item dashboard-item_others">
                <img src="{{ asset('img/'. $tenant->user->avatar) }}" alt="" class="dashboard-others_icon">
                <div class="dashboard-others_details ">
                    <span>Name: <strong>{{ $tenant->user->first_name. " " . $tenant->user->last_name}}</strong></span>
                    <span>Rental: <strong>{{ $tenant->rental->name }}</strong></span>
                    <span>Contact: <strong>{{ $tenant->user->phone_number }}</strong></span>
                    <span>Owed:<strong>
                        @foreach($tenant->bill as $bill)
                        <?php 
                        $total = 0;
                        $total += $bill->balance;
                        ?>
                        @endforeach
                        {{ $total }} shillings
                    </span>
                </div>
                <a href="#" id="evict">
                    <button type="submit" id="submit">Remove<span class="slide-left slide-danger"></span></button>
                </a>
            </div>
            @endforeach
            @else
            <h3>You currently have no tenants at any of your rentals</h3>
            <a class="add" href="{{ route('rental') }}">Would you like to add some to your rentals?</a>
            @endif
            @endforeach
            @else
            <h3>You currently have no rentals</h3>
            @endif
        </div>
    </div>
    <script src="../js/main.js"></script>
    <script src="../js/dashboard.js"></script>
</body>
</html>