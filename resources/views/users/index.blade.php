@extends('layouts.app')
@section('content')
<ul class="list-group">
    @forelse($users as $user )
    <li class="list-group-item">
        <h5>{{$user->id}} - {{$user->name}} - {{$user->email}} - {{$user->is_admin}} </h5>
        <form action="{{ url('users/destroy/'.$user->id) }}" method="POST">
            <a class="btn btn-info" href="{{ url('users/show',$user->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ url('users/edit',$user->id) }}">Edit</a>
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </li>

    @empty
    <h5 class="text-center">No Users Found!</h5>
    @endforelse
</ul>
{!! $users->links('pagination::bootstrap-4') !!}

@endsection