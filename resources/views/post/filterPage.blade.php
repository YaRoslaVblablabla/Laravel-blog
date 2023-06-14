@extends('post.main')
@section('title')Edit post @endsection
@section('q')
<h2 class="text-center">on this page you can set the necessary search parameters for posts</h2>

<form class="d-flex flex-wrap" action="{{route('filters')}}" method="GET" enctype='multipart/form-data'>
    @csrf
    <div class="mb-3 w-50">
      <label class="form-label">Tags</label>

      @foreach($catTag[1] as $tag)
      <div class="form-check">
          
          <input 
            name='tags[]' 
            class="form-check-input" 
            type="checkbox" 
            value="{{ $tag->id }}"
            @isset($request->tags)
              @foreach ($request->tags as $pt)
                    {{ $pt == $tag->id ? 'checked' : '' }}
              @endforeach
            @endisset
          >          
      
          <label class="form-check-label">
            {{ $tag->title }}
          </label>

      </div>
      @endforeach
    </div>
    <div class="w-50">
        <div class="mb-3 w-75">
            <label class="form-label">Select category</label>
            <select name="category_id" class="form-select w-50" aria-label="Default select example">
        
                <option value="{{ false }}" selected>Open this select menu</option>

                @foreach ($catTag[0] as $category)
                <option 
                {{ $request->category_id == $category->id ? 'selected' : ''}} 
                    name='category_id' 
                    value="{{ $category->id }}"
                >
                {{ $category->title }}</option>
                @endforeach
            
            </select>
        </div>
        <div class="mb-3 w-75">
          <label  class="form-label">Title search</label>
          <input value="{{ $request->title }}" type="text" class="form-control" name='title'>
        </div>
       
    </div>

    <button type="submit" class="btn btn-primary mx-auto w-25">find</button>

  </form>
<h3>Count of posts {{ $postsCount[1] }} </h3>
<div class="row row-cols-1 row-cols-md-2 g-2">
     
    @forelse ($postsCount[0] as $post)

      <div class="col">
        <div class="card">
          <a href="{{ route('postShow', $post)}}">
            <img src="{{ substr($post->img, 0, 4) == 'http' ? $post->img : asset('storage/'.$post->img)}}" class="card-img-top" alt="...">
          </a>

          <div class="card-body d-flex align-items-center justify-content-between">
            <a href="{{ route('postShow', $post)}}"><h5 class="card-title">{{ $post->title }}</h5></a>
            <div class="d-flex align-items-center">
              <h5 class="m-2"><span class="fs-4">{{ $post->likes }}</span></h5>
              <form action="{{ route('postLike', $post)}}" method="POST">
                @csrf
                @method('patch')
                @auth()

                  @if(auth()->user()->likedPosts->contains($post->id))
                      <button type="submite" class="btn btn-warning">Remove</button>
                  @else
                      <button type="submite" class="btn btn-success">like</button>
                  @endif

                @endauth
              </form>

            </div>
          </div>
        </div>
      </div>

    @empty
      <div><p>Such post dosn't exist</p></div>
    @endforelse
      
</div>

@endsection