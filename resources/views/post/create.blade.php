@extends('panel.main')
@section('title')Create post @endsection
@section('q')
<h2 class="text-center">Create post</h2>

<form action="{{route('postStore')}}" method="POST" enctype='multipart/form-data'>
    @csrf
    <div class="mb-3">
      <label class="form-label">Title</label>
      <input type="text" name="title" class="form-control" {{ old('title') }}>
      
      @error('title')
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Content</label>
      <textarea name="content" class="form-control" id="exampleInputPassword1">{{ old('content') }}</textarea>
      
      @error('content')
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">Download image</label>
        <input class="form-control" name="file" type="file" id="formFile">
        
        @error('file')
          <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Select category</label>
        <select name="category_id" class="form-select" aria-label="Default select example">
      
            <option value="{{ false}}" selected>Open this select menu</option>

            @foreach ($catTag[0] as $category)
              <option value="{{ $category->id}}">{{ $category->title }}</option>
            @endforeach
        
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Tags</label>

        @foreach($catTag[1] as $tag)
          <div class="form-check">
            <input name='tags[]' class="form-check-input" type="checkbox" value="{{ $tag->id }}" id="flexCheckChecked">
            <label class="form-check-label">
              {{ $tag->title }}
            </label>
          </div>
        @endforeach
    </div>

    <button type="submit" class="btn btn-primary">add</button>
</form>

@endsection