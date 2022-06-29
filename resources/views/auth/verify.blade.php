<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify</title>
</head>
<body>
    @if(session('error'))
        <div id="notification">
            <p>Success</p>
            <p>{{ session('error') }}</p>
        </div>
        @endif
    <div class="verify-container">
        <h3>Verify your phone number</h3>
        <div class="verify-details">
            <form action="{{ route('post.code') }}" method="post">
            @csrf
            <label for="phonenumber">
                Please enter the code sent to:
            </label>
            <input value="{{ $phone_number }}" name="phone_number">
            <label for="code">
                Code:
            </label>
            <input type="number" name="verification_code">
            <button type="submit">Send</button>
            </form>
        </div>
    </div>
</body>
</html>