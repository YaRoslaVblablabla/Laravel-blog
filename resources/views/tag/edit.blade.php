@extends('panel.main')
@section('title')Update tag @endsection
@section('q')
<h2 class="text-center">Edit tag</h2>
<form action="{{ route('tagUpdate', $tag)}}"  class="w-50" method="POST">
    @csrf
    @method('patch')

    <div class="mb-3">
        <label class="form-label">title</label>
        <input type="text" value="{{ $tag->title }}" name="title" class="form-control">
        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <a href="{{ route('tagIndex')}}" class="btn btn-danger">back</a>
    <button type="submit" class="btn btn-primary">update</button>
</form>
@endsection