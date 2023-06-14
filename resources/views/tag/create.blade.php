@extends('panel.main')
@section('title')Create tag @endsection
@section('q')
<h2 class="text-center">Create tag</h2>
<form action="{{ route('tagStore')}}" class="w-50" method="POST">
    @csrf
    
    <div class="mb-3">
        <label class="form-label">Title</label>
        
        <input type="text" value="{{ old('title') }}" name="title" class="form-control" id="exampleInputPassword1">
        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <a href="{{ route('tagIndex')}}" class="btn btn-danger">back</a>
    <button type="submit" class="btn btn-primary">create</button>
    
</form>

@endsection