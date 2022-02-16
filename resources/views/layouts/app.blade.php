<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <title>Posty</title>
</head>
<body>
    <nav class="main-nav">
        <ul class="main-nav-items left">
            <li class="main-nav-item">
                <a href="{{ route('/') }}">Home</a>
            </li>
            @auth
            <li class="main-nav-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            @endauth
            <li class="main-nav-item">
                <a href="{{ route('posts') }}">Post</a>
            </li>
        </ul>
        <ul class="main-nav-items right">
            @auth

                <li class="main-nav-item">
                    <form action="{{ route('logout') }}" method='post'>
                        @csrf
                    
                        <button type="submit" class="logout">Logout</button>
                    </form>
                </li>
        
                <li class="main-nav-item">
                    <a href='#'>{{ auth()->user()->name }}</a>
                </li>
            @endauth

            @guest
                <li class="main-nav-item">
                    <a href="{{ route('register') }}">Register</a>
                </li>
                <li class="main-nav-item">
                    <a href="{{ route('login') }}">Login</a>
                </li>
            @endguest
        </ul>
    </nav>
    @yield('content')
</body>
</html>