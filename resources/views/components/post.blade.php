@props(['post' => $post])
<style>
    .posts-container{
        display: flex;
        width: 60%;
        flex-direction: column;
    }

    .post-container{
        border: 0.1rem solid rgb(3, 192, 255);
        margin-left: 2rem;
        margin-bottom: 2rem;
    }

    .post-container > a{
        margin-left: 1rem;
        text-decoration: none;
        color: black;
        font-variant:small-caps;
    }

    .post-container > a:hover{
        text-decoration: underline;
        color: rgb(127, 223, 255);
    }

    .post-container > p{
        margin-left: 1rem;
    }

    .post-actions{
        display: flex;
        
    }

    .post-actions > form:nth-child(2){
        padding: 0rem;
        margin: 0rem;
    }
    </style>
    <div class="posts-container">
        <div class="post-container">
            <a href="{{ route('users.posts', $post->user) }}">{{ $post->user->name }}</a> 
            <p>{{ $post->body }}</p>
            
            <div class="post-actions">
                @if(!$post->LikedBy(auth()->user()))
                    <form action="{{ route('posts.likes', $post) }}" class="choice" method='post'>
                        @csrf
                        <button type="submit">Like</button>
                    </form>
                @else
                    <form action="{{ route('posts.likes', $post) }}" class="choice" method='post'>                                
                        @csrf
                        @method('DELETE')
                        <button type="submit">Unlike</button>
                    </form>
                @endif
                @can('delete', $post)
                    <form action="{{ route('posts.destroy', $post) }}" method='post'>
                        @csrf
                        @method('DELETE')
                        <button type='submit'>Delete</button>
                    </form>
                @endcan
            </div>
            <span>{{ $post->likes->count() }} {{ Str::plural('like',$post->likes->count()) }}</span> 
            <span style="margin-left: 6rem;">{{ $post->created_at->diffForHumans() }}</span>
        </div>
    </div>