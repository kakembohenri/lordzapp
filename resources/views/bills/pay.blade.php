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
    @if(session('greater'))
    <div id="notification">
        <p>{{ session('greater') }}</p>
    </div>
    @endif
    @if(session('paid'))
    <div id="notification">
        <p>{{ session('paid') }}</p>
    </div>
    @endif
    <div class="navbar-vertical">
        <ul class="navbar-vertical-items ">
            <li class="navbar-vertical-item">
                <a href="{{ route('tenant') }}">
                    <img src="../images/home1.png" alt="icon" class="icon">
                    <span>Home</span>
                </a>
            </li>
            <li class="navbar-vertical-item">
                <a href="#">
                    <img src="../images/rent-due.jpeg" alt="icon" class="icon">
                    <span>Pay Rent</span>
                </a>
            </li>
            <li class="navbar-vertical-item">
                <a href="#">
                    <img src="../images/history1.png" alt="icon" class="icon">
                    <span>Bills History</span>
                </a>
            </li>
            <li class="navbar-vertical-item">
                <a href="#">
                    <img src="../images/settings1.png" alt="icon" class="icon">
                    <span>Settings</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-contacts">
            <li><a href="#">
                <img src="../images/fb.jpeg" >
            </a></li>
            <li><a href="#">
                <img src="../images/twitter.png">
            </a></li>
            <li><a href="#">
                <img src="../images/insta.png">
            </a></li>
        </ul>
        <div class="navbar-adjust">
            <span></span>
            <span></span>
        </div>
    </div>

    <div class="dashboard-container">
        <div class="dashboard-welcome dashboard-others">
            <h3>Rent due</h3>
            {{-- <form action="#" class="search">
                <input type="text" class="search" placeholder="Search...">
            </form> --}}
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
            <div class="table_action">
                <button id="pay-rent" type="button">
                    Pay
                </button>
            </div>
            <div class="form-container-detail form-container_rent">
                <div class="form-title">
                    <h3>Powered by mobile money</h3>
                    <p>Amount due: {{ $bill->balance }}</p>
                </div>
                <div class="forms-box">
                <form action="{{ route('rent.pay', ['bill' => $bill]) }}" class="landlord" method="post">
                    @csrf
                    <div class="form-item">
                        <input type="text" name="p_number" placeholder="Phone number" value="{{ auth()->user()->phone_number }}" required>
                        {{-- <div class="form-item_error">
                            <small>Error</small>
                        </div> --}}
                    </div>
                    <div class="form-item">
                        <input type="text" name="amount" value="{{ $bill->balance }}" placeholder="Amount" required>
                        {{-- <div class="form-item_error">
                            <small>Error</small>
                        </div> --}}
                    </div>
                    <div class="form-item">
                        <input type="password" name="password" placeholder="Password">
                        {{-- <div class="form-item_error">
                            <small>Error</small>
                        </div> --}}
                    </div>
                    <button type="submit" id="submit" style="width: 30%;">Pay<span class="slide-left"></span></button>
                </form>
                </div>
                
            </div>
            @endforeach
        </div>
        @else
        <h3>No over due rent</h3>
        @endif
    </div>
    </div>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>