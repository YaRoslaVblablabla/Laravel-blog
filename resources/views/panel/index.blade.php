@extends('panel.main')
@section('title')Users @endsection
@section('q')
<h2 class="text-center">Users</h2>

<div class="d-flex mb-2 fs-3 justify-content-between">
  number of users: {{ $count }}
</div>

<table class="table table-success table-striped">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">role</th>
        <th scope="col">register date</th>
        @can('moderator')
          <th scope="col">change role</th>
          <th scope="col">delete</th>
        @endcan
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      
      <tr>
        <th scope="row">{{ $user->id}}</th>
        <td>{{ $user->name}}</td>
        <td>{{ $user->email}}</td>
        <td>
          @if($user->role !== null) 
            {{ $user->role->title}}
            @else
            user baned
          @endif
        </td>
        <td>{{ $user->created_at}}</td>

        
          <td>
            @if($user->role_id < auth()->user()->role_id)  
             
              <a href="{{ route('changeRole', $user)}}" class="btn btn-success">change</a>
            
            @else
              {{ false }}
            @endif
          </td>
         
          <td>
            @if($user->role_id < auth()->user()->role_id) 
              <form action="{{ route('deleteUser', $user)}}" method="POST">
                  @csrf
                  @method('delete')
                  <button style="submit" class="btn btn-danger">X</button>
              </form>
            @endif
          </td>
      </tr>

      @endforeach
    </tbody>
</table>

<div class="mt-4 mx-auto d-flex justify-content-center">
  {{ $users->links()}}
</div>

@endsection