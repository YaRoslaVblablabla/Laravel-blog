@extends('post.main')
@section('title')Update password @endsection
@section('q')
    
    <form action="{{ route('pageUpdatePassword') }}" method="POST" class="w-50 mt-4" enctype='multipart/form-data'>
        @csrf
        @method('patch')
        <h2 class="text-center">Update data</h2>
        
        <div class="mb-3">
          <label class="form-label">Old assword</label>
          <input type="password" name="password" class="form-control">
        </div>
    
        <div class="mb-3">
            <label class="form-label">Password confirm</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">New password</label>
            <input type="text" name="new_password" class="form-control">
          </div>

        <a href="{{ route('personalPage')}}" class="btn btn-danger">back</a>
        <button type="submit" class="btn btn-primary">update password</button>
    </form>
    
@endsection