@extends('layouts.app')

@section('content')
<style>
    .status-container{
        width: 15%;
    }
    .status{
        display: flex;
        background: white;
        height: 5rem;
        text-align: center;
        border-radius: 0.5rem;
        border-left: 0.2rem solid red;
    }

    .status > p{
        color: red;
        padding-left: 0.5rem;
        padding-top: 1rem;
        word-wrap: break-word;
        font-weight: bold;
    }

    input:nth-child(0),
    input:nth-child(1){
        height: 3rem;
        width: 100%;
        padding: 0.5rem;
        outline: none;
    }

    input:nth-child(0):focus,
    input:nth-child(1):focus{
        border: 0.1rem solid skyblue;
    }

    strong{
        color: red;
    }

    input[type="checkbox"]{
        height: 1rem;
        width: 1rem;
    }

    .main-form-item > button{
        border-radius: 0rem;
        background: rgb(127, 223, 255);
        color: white;
        border: 0.2rem solid rgb(127, 223, 255);
        cursor: pointer;
    }

    .main-form-item > button:hover{
        border: 0.2rem solid rgb(3, 192, 255);
    }

.error{
    border: 0.1rem solid red;
}
</style>
        <div>
            <div class="status-container">
                @if(session('status'))
                <div class="status">
                    <p id="status">{{ session('status') }}</p>
                </div>
                @endif
            </div>
            <form action="{{ route('login') }}" class="login" method='post'>
                
                @csrf
            
                <div class='main-form-item'>
                    
                    <input type='email' class="@error('email') error @enderror" name='email' placeholder='Your email' />
                </div>
                @error('email')
                    <div>
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                <br />
                <div class='main-form-item'>
                    
                    <input type='password' class="@error('password') error @enderror" name='password' placeholder='Your password' />
                </div>
                @error('password')
                    <div>
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                <br />
                <div class='main-form-item'>
                    Remember me:
                    <input type="checkbox" name="remember" class="check" />
                </div>
                <br />
                <div class='main-form-item btn'>
                    <button type='submit' class="">Login</button>
                </div>
            </form>
        </div>
        <script>
            var remove = document.querySelector(".status-container")
            
            setTimeout(() => {
                remove.style.display = 'none'
            }, 3000)

            
        </script>
@endsection