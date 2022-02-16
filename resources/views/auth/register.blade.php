@extends('layouts.app')

@section('content')
            <form action="{{ route('register') }}" method='post'>
                @csrf
                <div class='main-form-item'>
                    
                    <input type='text' name='name' placeholder='Your name' value="{{ old('name') }}" />
                </div>
                @error('name')
                    <div>
                        {{ $message }}
                    </div>
                @enderror
                <br />
                <div class='main-form-item'>
        
                    <input type='text' name='username' placeholder='Your username' />
                </div>
                <br />
                <div class='main-form-item'>
                    
                    <input type='email' name='email' placeholder='Your email' />
                </div>
                <br />
                <div class='main-form-item'>
                    
                    <input type='password' name='password' placeholder='Your password' />
                </div>
                @error('password')
                    <div>
                        {{ $message }}
                    </div>
                @enderror
                <br />
                <div class='main-form-item'>
                    
                    <input type='password' name='password_confirmation' placeholder='Repeat your password' />
                </div>
                @error('password_confirmation')
                    <div>
                        {{ $message }}
                    </div>
                @enderror
                <br />
                <div class='main-form-item btn'>
                    <button type='submit' class="">Register</button>
                </div>
            </form>
@endsection