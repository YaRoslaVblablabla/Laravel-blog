@extends('panel.main')
@section('title')Update category  @endsection
@section('q')
<h2 class="text-center">Edit category</h2>
<form action="{{ route('catUpdate', $category)}}"  class="w-50" method="POST">
    @csrf
    @method('patch')
    <div class="mb-3">
        <label class="form-label">title</label>
        <input type="text" value="{{ $category->title }}" name="title" class="form-control" id="exampleInputPassword1">
        @error('title')
            <p class="text-danger">category should contain 5-30 symbols</p>
        @enderror
    </div>
    <a href="{{ route('catIndex')}}" class="btn btn-danger">back</a>
    <button type="submit" class="btn btn-primary">update</button>
    
</form>

@endsection