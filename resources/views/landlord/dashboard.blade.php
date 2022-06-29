<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <title>Landlord dashboard</title>
</head>
<body>
    @if(session('status_landlord'))
    <div id="notification">
        <p>Success</p>
        <p>{{ session('status_landlord') }}</p>
    </div>
    @endif
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
        <a href="{{ route('landlord') }}"><img src="{{ asset('images/company-logo1.png') }}" alt="company-logo"></a>
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
                <a href="{{ route('rent.due') }}">
                    <img src="{{ asset('images/rent-due2.png') }}" alt="icon" class="icon">
                    <span>Rent Due @if($bills->count() > 0)<span id="count">{{ $bills->count() }}</span>@endif</span>
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
            <h3>Welcome, {{ auth()->user()->first_name. " " . auth()->user()->last_name }}</h3>
            <img src="{{ asset('images/user.png') }}" id="hover">
            <ul class="account-options">
                <li>Settings</li>
                <li>Account</li>
                <li id="logout">
                    <form action="{{ route('logout') }}" class="logout" method="post">
                        @csrf
                        <button class="logout-btn" type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="dashboard-graph">
            <!-- Graph of amount against dates -->
            <canvas id="myChart"></canvas>
        </div>
        <div class="dashboard-items">
            <div class="dashboard-item">
                <div class="dashboard-item_details">
                    <span>Rentals</span>
                    <span>{{ auth()->user()->rental->count() }}</span>
                </div>
                <img src="{{ asset('images/rental1.png') }}" alt="" class="dashboard-item_icon">
            </div>
            <div class="dashboard-item">
                <div class="dashboard-item_details">
                    <span>Tenants</span>
                    <span>
                       <?php
                       $total = 0;
                       foreach(auth()->user()->rental as $rental)
                       {
                           $total += $rental->tenant->count();
                       }
                       echo $total;
                       ?>
                    </span>
                </div>
                <img src="{{ asset('images/tenants.jpeg') }}" alt="" class="dashboard-item_icon">
            </div>
            <div class="dashboard-item">
                <div class="dashboard-item_details">
                    <span>Rent collection success</span>
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
                <img src="{{ asset('images/rent-due.jpeg') }}" alt="" class="dashboard-item_icon">
            </div>
            <div class="dashboard-item">
                <div class="dashboard-item_details">
                    <span>Average rent per month</span>
                    <span>200000 shillings</span>
                </div>
                <img src="{{ asset('images/calendar.jpeg') }}" alt="" class="dashboard-item_icon">
            </div>
            <div class="dashboard-item">
                <div class="dashboard-item_details">
                    <span>Total</span>
                    <span>{{ $paid }} shillings</span>
                </div>
                <img src="{{ asset('images/total.png') }}" alt="" class="dashboard-item_icon">
            </div>
        </div>
        
        <div class="billing-cycle-container">
            <h3>Billing cycle</h3>
            <div class="billing-table-row billing-head">
                <div class="billing-table-cell">
                    Name
                </div>
                <div class="billing-table-cell">
                    Bill
                </div>
            </div>
            @foreach($updates as $bill)
            @foreach($tenants as $tenant)
            @if(number_format($bill->tenant_id) == $tenant->tenant_id)
            @if(($bill->created_at->addDays(25)) < now() && now() < ($bill->created_at->addDays(30)))
            <div class="billing-table-row">
                <div class="billing-table-cell">
                    {{ $bill }}
                </div>
                <div class="billing-table-cell">
                    <form action="#" method="POST">
                        @csrf
                        <input type="submit" value="Bill">
                    </form>
                </div>
            </div>
            @endif
            @endif
            @endforeach
            @endforeach
        </div>
    </div>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/node_modules/chart.js/dist/chart.js') }}"></script>
    <script>
        let myChart = document.querySelector('#myChart').getContext('2d')

        let massPopChart = new Chart(myChart, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Amount',
                    data: [
                        1200000,
                        1100000,
                        3000000,
                        2500000,
                        2700000,
                        2800000,
                        2900000
                    ],
                    backgroundColor: [
                        'red',
                        'orange',
                        'yellow',
                        'green',
                        'blue',
                        'indigo'
                    ],
                    borderWidth: 1,
                    borderColor: '#777',
                    hoverBorderWidth: 3,
                    hoverBorderColor: '#000'
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Rent Collected',
                    fontSize: 25
                },
                legend: {
                    display: false,
                    position: 'right',
                    labels: {
                        fontColor: '#000'
                    }                    
                },
                layout: {
                    padding: {
                        left: 50,
                        right: 0,
                        bottom: 0,
                        top: 0
                    }
                },
                tooltips: {
                    enabled: true
                }

            }
        })
    </script>
</body>
</html>