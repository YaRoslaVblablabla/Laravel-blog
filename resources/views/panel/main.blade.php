<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Panel: @yield('title')</title>
</head>
<body>
    <div class="d-flex w-100 header text-light border border-dark p-3 mb-4 align-items-center justify-content-between">
        <div class="fs-2">
            {{ auth()->user()->name }}
            <h6>Role: {{ auth()->user()->role->title}}</h6>
        </div>
        <div><a href="{{ route('logout')}}" class="btn btn-danger">Logout</a></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <ul class="list-group mt-5">
                    @can('moderator')
                        <a href="{{ route('indexUsers') }}" class="list-group-item">Users</a>
                        <a href="{{ route('catIndex') }}" class="list-group-item">Categories</a>
                        <a href="{{ route('tagIndex') }}" class="list-group-item">Tags</a>
                    @endcan
                    <a href="{{ route('postIndexPanel') }}" class="list-group-item">All posts</a>
                    <a href="{{ route('suggestedPosts')}}" class="list-group-item">Show suggested posts</a>      
                    <a href="{{ route('postIndex') }}" class="list-group-item">Return to main page</a>             
                </ul>
            </div>
            <div class="col-lg-9 pb-4">@yield('q')</div>
        </div>
    </div>
</body>
</html>