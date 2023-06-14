@extends('panel.main')
@section('title')Create post @endsection
@section('q')
<h2 class="text-center">Approved post</h2>
<div class="d-flex fs-3 justify-content-between">
  number of posts: {{ $postsCount[0] }}
  <a href="{{ route('postCreate') }}" class="btn btn-success mb-3">Create post</a>
</div>
<table class="table table-success table-striped">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">title</th>
        <th scope="col">category</th>
        <th scope="col">content</th>
        <th scope="col">img</th>
        <th scope="col">likes</th>
        <th scope="col">change</th>
        <th scope="col">delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($postsCount[1] as $post)
      
      <tr>
        <th scope="row">{{ $post->id}}</th>
        <td>{{ $post->title}}</td>
        <td>{{ $post->category->title}}</td>
        <td>{{ mb_strlen($post->content) <= 20 ? $post->content : substr($post->content, 0, 20).'...'}}</td>
        <td><img src="{{ substr($post->img, 0, 4) == 'http' ? $post->img : asset('storage/'.$post->img)}}" class="panelImg" alt=""></td>
        <td>{{ $post->likes }}</td>
        <td><a href="{{ route('postEdit', $post )}}" class="btn btn-success">edit</a></td>
        <td>
            <form action="{{ route('postDelete', $post )}}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger">delete</button>
            </form>
        </td>
      </tr>

      @endforeach
    </tbody>
</table>

<div class="mt-4 mx-auto d-flex justify-content-center">
  {{ $postsCount[1]->links()}}
</div>

@endsection