@extends('panel.main')
@section('title')Post detail @endsection
@section('q')
<h2 class="text-center">Details</h2>

<form action="{{route('postUpdate', $post)}}" method="POST" enctype='multipart/form-data'>
  @csrf
  @method('patch')
  
  <div class="mb-3">
    <label class="form-label">Title</label>
    <input value='{{ $post->title}}' name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  
  <div class="mb-3">
    <label class="form-label">Content</label>
    <input value='{{ $post->content }}' name="content" type="text" class="form-control" id="exampleInputPassword1">
  </div>

  <div class="mb-3">
    <label class="form-label">Download file</label><br>
    <img src="{{ asset('storage/'.$post->img)}}" class="panelImg mb-2" alt="">
    <input name='file' value='{{ $post->img }}' class="form-control" type="file">
  </div>

  <div class="mb-3">
    <label class="form-label">Categories</label>
    <select name="category_id" class="form-select">
      <option value="{{ false}}">Open this select menu</option>
      @foreach($catTag[0] as $cat)
        <option 
          {{ $post->category_id == $cat->id ? 'selected' : ''}} 
            name='category_id' 
            value="{{ $cat->id }}"
        >
          {{ $cat->title }}
        </option>
      @endforeach
    </select>
  </div>

  <div class="mb-3">
    <label class="form-label">Tag</label>
    @foreach($catTag[1] as $tag)
      <div class="form-check">
        <input 
          name='tags[]'  
          class="form-check-input" 
          type="checkbox" 
          value="{{ $tag->id }}" id="flexCheckChecked"
            @foreach ($post->tags as $pt)
              {{ $pt->id == $tag->id ? 'checked' : '' }}
            @endforeach
        >
        <label class="form-check-label">
          {{ $tag->title }}
        </label>
      </div>
    @endforeach
  </div>

  <a href="{{ route('suggestedPosts') }}" class="btn btn-danger">back</a>
  <button type="submit" class="btn btn-success">approve</button>

</form>

<form class="mt-2" action="{{ route('deleteSuggestedPost', $post )}}" method="POST">
    @csrf
    @method('delete')
    <button class="btn btn-dark">delete</button>
</form>

@endsection