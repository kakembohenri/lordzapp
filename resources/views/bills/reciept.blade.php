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
                <a href="{{ route('reciept') }}">
                    <img src="{{ asset('images/rent-due2.png') }}" alt="icon" class="icon">
                    <span>Reciepts</span>
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
            <h3>Reciepts</h3>
            {{-- <form action="#" class="search">
                <input type="text" class="search" placeholder="Search...">
            </form> --}}
        </div>
       @if($reciepts->count() > 0)
        <div class="dashboard-items table-container">
            @foreach($reciepts as $reciept)
            <h5 id="table-date">Date: <strong>{{ $reciept->created_at->toDateString() }}</strong></h5>
            <div class="table-row table-head">
                <div class="table-cell">
                    <p>Name</p>
                </div>
                <div class="table-cell">
                    <p>To</p>
                </div>
                <div class="table-cell">
                    <p>Amount</p>
                </div>
                <div class="table-cell">
                    <p>Balance</p>
                </div>
            </div>
            <div class="table-row">
                <div class="table-cell">
                    <p>{{ $reciept->name }}</p>
                </div>
                <div class="table-cell">
                    <p>{{ $reciept->to }}</p>
                </div>
                <div class="table-cell">
                    <p>{{ $reciept->amount }} shs</p>
                </div>
                <div class="table-cell">
                    <p>{{ $reciept->balance }} shs</p>
                </div>
            </div>
            <div class="table_action">
                <a href="{{ route('pdf', ['reciept' => $reciept]) }}">
                    Download
                </a>
            </div>
            @endforeach
        </div>
        @else
        <h3>No reciepts</h3>
        @endif
    </div>
    </div>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>