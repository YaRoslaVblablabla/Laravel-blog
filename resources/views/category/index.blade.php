@extends('panel.main')
@section('title')Categories @endsection
@section('q')
<h2 class="text-center">Categories</h2>
<div class="d-flex fs-3 justify-content-between">
    number of categories: {{ $count }}
    <a href="{{ route('catCreate')}}" class="btn btn-success">create category</a>
</div>
<div class="d-flex flex-wrap pt-4">
    @foreach ($categories as $category)
        <div class="d-flex fs-5 justify-content-between align-items-center w-100 mb-2 border border-dark px-3">
            {{ $category->title }}
            <form action="{{ route('catDelete', $category)}}" class='m-3' method="POST">
                @csrf
                @method('delete')
                <a href="{{ route('catEdit', $category)}}" class="btn btn-warning">edit</a>
                <button class="btn btn-danger">delete</button>
            </form>
        </div>
    @endforeach
    <div class="mt-4 mx-auto d-flex justify-content-center">
        {{ $categories->links()}}
    </div>
</div>
@endsection