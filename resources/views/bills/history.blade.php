<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <title>History</title>
</head>
<body>
    <style>
        strong{
            color: purple;
            font-weight: 600;
            font-size: 1.4rem;
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
    <div class="company-logo company-logo_dashboard">
        <a href="#"><img src="../images/company-logo1.png" alt="company-logo"></a>
        <p>LordzApp &copy; 2022</p>
    </div>
    <div class="navbar-vertical">
        <ul class="navbar-vertical-items ">
            <li class="navbar-vertical-item">
                @if(auth()->user()->landlord)
                <a href="{{ route('landlord') }}">
                    <img src="{{ asset('images/home1.png') }}" alt="icon" class="icon">
                    <span>Home</span>
                </a>
                @else
                <a href="{{ route('tenant') }}">
                    <img src="{{ asset('images/home1.png') }}" alt="icon" class="icon">
                    <span>Home</span>
                </a>
                @endif
            </li>
            @if(auth()->user()->tenant)
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
            @endif
            @if(auth()->user()->landlord)
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
            @endif

            <li class="navbar-vertical-item">
                <a href="{{ route('history') }}">
                    <img src="{{ asset('images/history1.png') }}" alt="icon" class="icon">
                    <span>Bills History</span>
                </a>
            </li>
            @if(auth()->user()->landlord)
            <li class="navbar-vertical-item">
                <a href="{{ route('rent.due') }}">
                    <img src="{{ asset('images/rent-due2.png') }}" alt="icon" class="icon">
                    <span>Rent Due: 
                        @if(auth()->user()->landlord->bill->count() > 0)
                        <span id="count">{{ auth()->user()->landlord->bill->where('status', 'unpaid')->count() }}</span>
                        @endif
                    </span>
                </a>
            </li>
            @endif
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
            <h3>Bills history</h3>
            @if(auth()->user()->landlord)
            <a class="download" href="{{ route('download.bills') }}">
                Download history
            </a>
            @endif
        </div>
       @if($bills->count() > 0)
        <div class="dashboard-items table-container">
            @foreach($bills as $bill)
            <h5 id="table-date">Date: <strong>{{ $bill->created_at->toDateString() }}</strong> <span style="margin-left: 1rem;">Due Date: <strong>{{ $bill->created_at->addDays(30)->toDateString()}}</strong></span></h5>
            <div class="table-row table-head">
                <div class="table-cell">
                    <p>Rental Name</p>
                </div>
                <div class="table-cell">
                    <p>Tenant Name</p>
                </div>
                <div class="table-cell">
                    <p>Due</p>
                </div>
                <div class="table-cell">
                    <p>Paid</p>
                </div>
                <div class="table-cell">
                    <p>Balance</p>
                </div>
            </div>
            <div class="table-row">
                <div class="table-cell">
                    <p>{{ $bill->rental->name }}</p>
                </div>
                <div class="table-cell">
                    <p>{{ $bill->tenant->user->first_name . " " . $bill->tenant->user->last_name }}</p>
                </div>
                <div class="table-cell">
                    <p>{{ $bill->due }} shs</p>
                </div>
                <div class="table-cell">
                    <p>{{ $bill->paid }} shs</p>
                </div>
                <div class="table-cell">
                    <p>{{ $bill->balance }} shs</p>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <h3>No bills have been made yet</h3>
        @endif
    </div>
    </div>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>