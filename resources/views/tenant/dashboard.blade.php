<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <title>Tenant dashboard</title>
</head>
<body>
    <style>
        span#balance{
            color:crimson;
        }

        .dashboard-items{
            margin-top: 2rem;
        }

        strong{
            color: purple;
        }
        
        form.logout{
            width: fit-content;
            position: static;
            padding: 0rem;
            min-width: fit-content;
        }
    
    </style>
    <div class="backdrop"></div>
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
    @if(session('tenant'))
        <div id="notification">
            <p>Success</p>
            <p>{{ session('tenant') }}</p>
        </div>
        @endif
    <div class="company-logo company-logo_dashboard">
        <a href="#"><img src="{{ asset('images/company-logo1.png') }}" alt="company-logo"></a>
        <p>LordzApp @ 2022</p>
    </div>
    <div class="navbar-vertical">
        <ul class="navbar-vertical-items ">
            <li class="navbar-vertical-item">
                <a href="#">
                    <img src="{{ asset('images/home1.png') }}" alt="icon" class="icon">
                    <span>Home</span>
                </a>
            </li>
            <li class="navbar-vertical-item">
                <a href="{{ route('reciept') }}">
                    <img src="{{ asset('images/rent-due2.png') }}" alt="icon" class="icon">
                    <span>Reciepts</span>
                </a>
            </li>
            <li class="navbar-vertical-item">
                <a href="{{ route('rent') }}" >
                    <img src="{{ asset('images/rent-due.jpeg') }}" alt="icon" class="icon">
                    <span>Pay Rent</span>
                </a>
            </li>
            <li class="navbar-vertical-item">
                <a href="{{ route('history') }}">
                    <img src="{{ asset('images/history1.png') }}" alt="icon" class="icon">
                    <span>Bills History</span>
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
        <div class="dashboard-welcome">
            <h3>Welcome, <strong>{{ auth()->user()->first_name . " " . auth()->user()->last_name}}</strong></h3>
            <h3>Balance: <span id="balance">{{ $balance }} shs</span></h3>
            <img src="{{ asset('img/'. auth()->user()->avatar) }}" id="hover">
            <ul class="account-options">
                <li><a href="{{ route('rent') }}">Pay rent</a></li>
                <li>Settings</li>
                <li id="logout">
                    <form action="{{ route('logout') }}" class="logout" method="post">
                        @csrf
                        <button class="logout-btn" type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
        {{-- <div class="dashboard-graph">
            <!-- Graph of amount against dates -->
            <canvas id="myChart"></canvas>
        </div> --}}
        <div class="dashboard-items">
            <div class="dashboard-item">
                <div class="dashboard-item_details">
                    <span>Date Joined</span>
                    <span>{{ auth()->user()->created_at->toDateString() }}</span>
                </div>
                <img src="{{ asset('images/date joined.png') }}" alt="" class="dashboard-item_icon">
            </div>
            <div class="dashboard-item">
                <div class="dashboard-item_details">
                    <span>Outstanding Balance</span>
                    <span>{{ $balance }} shs</span>
                </div>
                <img src="{{ asset('images/balance.png') }}" alt="" class="dashboard-item_icon">
            </div>
            <div class="dashboard-item">
                <div class="dashboard-item_details">
                    <span>Rent Payment success</span>
                    <span>
                        @if($paid == 0)
                        0%
                        @else
                        {{ 
                        ($paid / $due) * 100
                         }}%
                        @endif
                    </span>
                </div>
                <img src="{{ asset('images/success.png') }}" alt="" class="dashboard-item_icon">
            </div>
            <div class="dashboard-item">
                <div class="dashboard-item_details">
                    <span>Total Rent Paid</span>
                    <span>{{ $paid }} shs</span>
                </div>
                <img src="{{ asset('images/total.png') }}" alt="" class="dashboard-item_icon">
            </div>
        </div>
    </div>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>