@extends('panel.main')
@section('title') Create category  @endsection
@section('q')
<h2 class="text-center">Create category</h2>
<form action="{{ route('catStore')}}" class="w-50" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">title</label>
        <input type="text" value="{{ old('title') }}" name="title" class="form-control" id="exampleInputPassword1">
        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <a href="{{ route('catIndex')}}" class="btn btn-danger">back</a>
    <button type="submit" class="btn btn-primary">create</button>
    
</form>

@endsection