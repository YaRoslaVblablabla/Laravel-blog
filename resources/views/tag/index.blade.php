@extends('panel.main')
@section('q')
@section('title')Tags @endsection
<h2 class="text-center">Tags</h2>
<div class="d-flex fs-3 justify-content-between">
    number of tags: {{ $count }}
    <a href="{{ route('tagCreate')}}" class="btn btn-success">create tag</a>
</div>
<div class="d-flex flex-wrap pt-4">
    @foreach ($tags as $tag)
    <div class="d-flex fs-5 justify-content-between align-items-center w-50 mb-2 border border-dark px-3">
        {{ $tag->title }}
        <form action="{{ route('tagDelete', $tag)}}" class='m-3' method="POST">
            @csrf
            @method('delete')
            <a href="{{ route('tagEdit', $tag)}}" class="btn btn-warning">edit</a>
            <button class="btn btn-danger">delete</button>
        </form>
    </div>
    @endforeach
    
    <div class="mt-4 mx-auto d-flex justify-content-center">
        {{ $tags->links()}}
    </div>
</div>
@endsection