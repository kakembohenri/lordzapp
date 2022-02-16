@extends('layouts.app')

@section('content')
<style>
    textarea{
        padding: 0.5rem;
        outline: none;
        border: 0.1rem solid black;
    }

    textarea:focus{
        border: 0.1rem solid rgb(127, 223, 255);
    }

    form{
        text-align: left;
    }

    .post-btn > button{
        background: rgb(127, 223, 255);
        cursor: pointer;
        border: 0.1rem solid rgb(127, 223, 255);
    }

    .post-btn > button:hover{
        border: 0.1rem solid rgb(3, 192, 255);
        color: white;
    }
    </style>
    <div class='main-posts'>
        <div class='main-post'>
            Posts
        </div>
        <form action="{{ route('posts') }}" class='main-post-form' method="post">
            @csrf
            <div class='form-textarea'>
                <textarea rows='5' name='body' cols="10" placeholder="Your post..."></textarea>
            </div>
                @error('body')
                    <div>
                        {{ $message }}
                    </div>
                @enderror
            <div class='post-btn'>
                <button type='submit'>Post</button>
            </div>
        </form>
        @if ($posts->count())
            @foreach($posts as $post)
                <x-post :post="$post" />
            @endforeach
        {{ $posts->links() }}
        @else
                <p>No posts</p>
        @endif
        
    </div>
@endsection