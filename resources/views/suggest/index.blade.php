@extends('panel.main')
@section('title')Suggested posts @endsection
@section('q')
<h2 class="text-center">Suggested posts</h2>
<div class="d-flex mb-2 fs-3 justify-content-between">
  number of suggested posts: {{ $count }}
</div>


<table class="table table-success table-striped">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">title</th>
        <th scope="col">category</th>
        <th scope="col">content</th>
        <th scope="col">img</th>
        <th scope="col">author</th>
        <th scope="col">change post</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
      
      <tr>
        <th scope="row">{{ $post->id}}</th>
        <td>{{ $post->title}}</td>
        <td>{{ $post->category->title}}</td>
        <td>{{ $post->content}}</td>
        <td><img src="{{ substr($post->img, 0, 4) == 'http' ? $post->img : asset('storage/'.$post->img)}}" class="panelImg" alt=""></td>
        <td>
          @if($post->user_id !== null )
          {{ $post->user->email }}
          @endif
        </td>
        <td><a href="{{ route('suggestedPostEdit', $post)}}" class="btn btn-success">open in redactor</a></td>
      </tr>

      @endforeach
    </tbody>
</table>
<div class="mt-4 mx-auto d-flex justify-content-center">
  {{ $posts->links()}}
</div>

@endsection