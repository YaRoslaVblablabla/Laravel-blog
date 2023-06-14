@extends('auth.main')
@section('q')

<form class="w-50" action="{{ route('authStore')}}" method="post">
    @csrf
    <h1 class="text-center">Login</h1>

    <div class="mb-3">
      <label class="form-label">Email address</label>
      <input type="email" value="{{ old('email') }}" name="email" class="form-control">
    </div>
    @error('email')
        <p class="text-danger">{{ $message }}</p>    
    @enderror

    <div class="mb-3">
      <label  class="form-label">Password</label>
      <input name="password" type="password" class="form-control">
    </div>
    @error('password')
        <p class="text-danger">{{ $message }}</p>    
    @enderror
   
    <a href="{{route('firstpage')}}" class="btn btn-danger">back</a>
    <button type="submit" class="btn btn-primary">login</button>
</form>
@endsection