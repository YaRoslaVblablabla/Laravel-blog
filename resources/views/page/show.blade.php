@extends('post.main')
@section('title')Create post @endsection
@section('q')
    <h2 class="text-center">Your data</h2>

    <h4>Your name: <span class="mx-2 fs-3">{{ auth()->user()->name }}</span></h4>
    <h4>Your email: <span class="mx-2 fs-3">{{ auth()->user()->email }}</span></h4>
    <div><a href="{{ route('pageEditData')}}" class="btn btn-success mb-3">Change data</a></div>
    <h4>Your role: <span class="mx-2 fs-3">{{ auth()->user()->role->title }}</span></h4>

    <div><a href="{{ route('pageEditPassword')}}" class="btn btn-success mt-3">Change password</a></div>
@endsection