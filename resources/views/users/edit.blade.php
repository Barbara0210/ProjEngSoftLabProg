@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('/users') }}"> Back</a>
        </div>
    </div>
</div>


<form action="{{ url('users/update/'.$user->id) }}" method="POST">
    @csrf

    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                    placeholder="Name">
            </div>  
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" value="{{ $user->email }}" class="form-control"
                    placeholder="Email">
            </div>  
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>is_admin:</strong>
                <input type="text" name="is_admin" value="{{ $user->is_admin }}" class="form-control"
                    placeholder="is_admin   ">
            </div>  
        </div>
      
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection