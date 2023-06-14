@extends('post.main')
@section('title')Update personael data @endsection
@section('q')
    
    <form action="{{ route('pageUpdateData') }}" method="POST" class="w-50 mt-4" enctype='multipart/form-data'>
        @csrf
        @method('patch')
        <h2 class="text-center">Enter new data</h2>
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" name="name" class="form-control" value="{{ auth()->user()->name}}">
        </div>
    
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="text" name="email" class="form-control" value="{{ auth()->user()->email}}">
        </div>
        <a href="{{ route('personalPage')}}" class="btn btn-danger">back</a>
        <button type="submit" class="btn btn-primary">update</button>
    </form>
    
@endsection