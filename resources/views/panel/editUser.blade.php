@extends('panel.main')
@section('title')Users @endsection
@section('q')

<h2 class="text-center">Select nessary role</h2>
<form action="{{ route('updateRole', $user) }}" class="mt-3 w-50" method="POST">
    @csrf
    @method('patch')

    <h4>Username: {{ $user->name }}</h4>
    <select name="role" class="form-select mb-3">
        
        @foreach($rols as $role)

            @if ($role->id < auth()->user()->role_id )
                
                <option
                    {{ $role->id == $user->role_id ? 'selected' : ''}}
                    name='role'
                    value="{{ $role->id }}"
                >
                    {{ $role->title }}
                </option>
                       
            @endif
        
        @endforeach
        
    </select>
    <a class="btn btn-danger" href="{{ route('indexUsers') }}">back</a>
    <button class="btn btn-success">update role</button>
</form>

@endsection