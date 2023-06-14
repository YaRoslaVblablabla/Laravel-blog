@extends('post.main')
@section('title')Post @endsection
@section('q')
    <h1 class="text-center mb-3">{{ $post->title}}</h1>
    <img src="{{ substr($post->img, 0, 4) == 'http' ? $post->img : asset('storage/'.$post->img )}}" class="w-75 mb-3" alt="">
    <h4>Category: 
        <span class="fs-4">
            @if($post->category == null )
                category not selected
            @else
                {{ $post->category->title }}
            @endif 
        </span></h4>
    <h5>Tags: 
        @foreach($post->tags as $tag) 
            <span class="btn btn-primary">{{ $tag->title }}</span>
        @endforeach
    </h5>
    <p>{{$post->content}}</p>
    <div class="mb-4">
        <form action="{{ route('postLike', $post)}}" method="POST">
            @csrf
            @method('patch')
            @auth()
                <span>Likes: {{ count($post->users)}}</span>
                @if(auth()->user()->likedPosts->contains($post->id))
                    <button type="submite" class="btn btn-warning">Remove</button>
                @else
                    <button type="submite" class="btn btn-success">like</button>
                @endif
            @endauth

        </form>

        <a @if (url()->previous() === 'http://127.0.0.1:8000/posts/more-likes')
                href="{{ route('moreLikes')}}"
            @elseif((mb_substr(url()->previous(), 0, 35) === 'http://127.0.0.1:8000/posts/filters'))
                href="{{ route('filters')}}"
            @else
                href="{{ route('postIndex')}}"
           @endif  class="btn btn-danger mt-3"
        >back</a> 
    </div>

    <form class="w-50 mx-auto mb-5 p-3 bg-secondary" action="{{ route('commentStore', $post) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label text-light fs-4">Create comment</label>
            <textarea class="form-control" name="comment"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">add comemnt</button>
    </form>

    @forelse($comments as $comment)
        <div class="w-75 mx-auto d-flex align-items-center justify-content-between p-3 pt-4 text-light mb-3 bg-secondary">
            <div>   
                <h3>{{$comment->user->name }}</h3>
                <p>{{ $comment->comment}} </p>
            </div>
            <form action="{{ route('commentDelete', $comment)}}" method="post">
                @csrf
                @method('delete')
            
                <button type="submit" class="btn btn-danger">delete</button>
            </form>
        </div>
    @empty
        <div class="w-75 mx-auto d-flex align-items-center justify-content-between p-3 pt-4 text-light mb-3 bg-secondary">
            комментариев нет
        </div>
    @endforelse

    <div class="mt-4 mx-auto d-flex justify-content-center">
        {{ $comments->links()}}
    </div> 
      
@endsection