<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>Lordzapp</title>
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
    <nav>
        <div class="company-logo">
            <img src="{{ asset('images/company-logo1.png') }}" alt="company-logo">
        </div>
        <ul class="navbar-items">
            <li class="navbar-item"><a href="#product-why">Why LordzApp?</a><span class="slide"></span></li>
            <li class="navbar-item"><a href="#contact-us">Contact us</a><span class="slide"></span></li>
            <li class="navbar-item"><a href="{{ route('register') }}">New here?</a><span class="slide"></span></li>
            <li class="navbar-item"><a href="{{ route('login') }}">Have an account already?</a><span class="slide"></span></li>
        </ul>
    </nav>
    <header>  
        <div class="greetings-images">
            <img src="{{ asset('images/img4.jpeg') }}" alt="slideshow" class="greetings-image">
            <img src="{{ asset('images/img2.jpeg') }}" alt="slideshow" class="greetings-image">
            <img src="{{ asset('images/img3.jpeg') }}" alt="slideshow" class="greetings-image">
        </div>
        <div class="greetings">
            <h3 class="greetings-title">LordzApp</h3>
            <div class="greetings-details">
                <p class="greetings-desc">LordzApp is a platform which gives you the ability to pay rent/revenue as a tenant and collect revenue or rent as a landlord with the added advantage of easily assessing data on transactions for easy data driven decision making </p>
                <a href="#" class="greetings-btn">Learn more <span class="slide-right"></span></a>
            </div>
        </div>
    </header>
    <h2 id="product-why">Why this product?</h2>
    <div class="product-reasons">
        <div class="reason">
            <img class="product-image" src="{{ asset('images/graph.png') }}" alt="product-image">
            <p>Precise visualization of data on rent collection which will provide easy intuition on how you are fairing</p>
        </div>
        <div class="reason">
            <img src="{{ asset('images/payment-online.jpg') }}" class="product-image" alt="product-image">
            <p>It comes along with an integrated payments system whose data shall be readily available at your disposal</p>
        </div>
        <div class="reason">
            <img src="{{ asset('images/tenant.jpeg') }}" class="product-image" alt="product-image">
            <p>Easily keep tabs on tenants to see how they fare when it comes to paying the rent</p>
        </div>
    </div>
    <footer>
        <h3 id="contact-us">Contact us</h3>
        <ul class="socials">
            <li><img src="{{ asset('images/fb.jpeg') }}"></li>
            <li><img src="{{ asset('images/twitter.png') }}"></li>
            <li><img src="{{ asset('images/insta.png') }}"></li>
        </ul>
        <!-- <p>Email address</p> -->
        <p>LordzApp &copy; 2022</p>
    </footer>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        var images = document.querySelectorAll('img.greetings-image')
let time = 2000
let totalTime = 6000

const slideshow = () => {
    setTimeout(() => {
        images[0].style.left = '0'
        images[1].style.left = '100%'
        images[2].style.left = '200%'
    }, time)

    setTimeout(() => {
        images[0].style.left = '-100%'
        images[1].style.left = '0'
        images[2].style.left = '100%'
    }, time*2);

    setTimeout(() => {
        images[0].style.left = '-200%'
        images[1].style.left = '-100%'
        images[2].style.left = '0'
    }, time*3);
}

setInterval(slideshow, totalTime);
    </script>
</body>
</html>