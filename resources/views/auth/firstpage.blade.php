@extends('auth.main')
@section('q')
    <h1 class="text-center mt-5">Welcome to the site</h1>
    <div class="mx-auto w-25">
        <a href="{{ route('regCreate')}}" class="btn btn-success">registration</a>
        <a href="{{ route('authCreate')}}" class="btn btn-info">authorization</a>
    </div>
@endsection