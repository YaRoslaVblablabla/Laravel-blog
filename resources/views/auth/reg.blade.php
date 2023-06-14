@extends('auth.main')
@section('q')

<form class="w-50" action="{{ route('regStore')}}" method="post">
    @csrf
    <h1 class="text-center">Registration</h1>
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input name="name" value="{{ old('name') }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    @error('name')
        <p class="text-danger">{{ $message }}</p>    
    @enderror

    <div class="mb-3">
      <label class="form-label">Email address</label>
      <input type="email" value="{{ old('email') }}" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    @error('email')
        <p class="text-danger">{{ $message }}</p>    
    @enderror

    <div class="mb-3">
      <label  class="form-label">Password</label>
      <input name="password" type="password" class="form-control" id="exampleInputPassword1">
    </div>
    @error('password')
        <p class="text-danger">{{ $message }}</p>    
    @enderror
    <div class="mb-3">
        <label class="form-label">Confirm password</label>
        <input type="password" name="password_confirmation" class="form-control">
        @error('password_confirmation')
            <p class="text-danger">{{ $message }}</p>    
        @enderror
    </div>
   
    <a href="{{route('firstpage')}}" class="btn btn-danger">back</a>
    <button type="submit" class="btn btn-primary">Create account</button>
</form>
@endsection