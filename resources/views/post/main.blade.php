<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Main Page</title>
</head>
<body>
    <div class="d-flex w-100 text-light header p-3 mb-4 align-items-center justify-content-between">
        <div class="fs-4">
          Name: <span class="fs-2">{{ auth()->user()->name }}</span>
          {{-- комментарий --}}
        </div>
        <div><a href="{{ route('logout')}}" class="btn btn-danger">Logout</a></div>
    </div>
    <div class="container pb-5">
        <div class="row">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                  <a class="navbar-brand" href="{{ route('postIndex')}}">Main page</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                      <a class="nav-link" href="{{ route('suggestPost')}}">Suggest post</a>
                      <a class="nav-link" href="{{ route('likedPosts')}}">Your likes</a>
                      <a class="nav-link" href="{{ route('moreLikes')}}">More likes</a>
                      <a class="nav-link" href="{{ route('filters')}}">Filters</a>
                      <a class="nav-link" href="{{ route('personalPage') }}">Your data</a>
                      @can('manager')
                        <a href="{{ route('welcome')}}" class="nav-link ">adminpanel</a>
                      @endcan
                    </div>
                  </div>
                </div>
              </nav>
            @yield('q')
        </div>
    </div>
    
    
</body>
</html>