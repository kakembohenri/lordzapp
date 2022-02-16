@extends('layouts.app')

@section('content')
    <div class='main-posts'>
        <div class='main-post'>
            {{ $user->name }}
            @if ($posts->count())
                @foreach($posts as $post)
                    <x-post :post="$post" />
                @endforeach
                {{ $posts->links() }}
                @else
                    <p>No posts</p>
            @endif
        </div>
    </div>
@endsection