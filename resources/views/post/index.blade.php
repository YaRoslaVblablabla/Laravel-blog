@extends('post.main')
@section('q')
  <div class="row row-cols-1 row-cols-md-2 g-2">
     
    @foreach ($postsCount[1] as $post)

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

    @endforeach
      
      

  </div>
  
  <div class="mt-4 mx-auto d-flex justify-content-center">
        {{ $postsCount[1]->links() }}
  </div>
@endsection