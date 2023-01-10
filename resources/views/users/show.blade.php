@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show User e seus anuncios</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('/users') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $user->name }}
        </div>
    </div>
    
   
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $user->email }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>IsAdmin:</strong>
            {{ $user->is_admin }}
        </div>
    </div>
    <br> </br>

    <h5>Seus Anuncios</h5>
    <table class="table table-bordered">
    <tr align="center ">
        <th>ID</th>
        <th>Titulo</th>
        <th>Estado</th>
        <th>Descricao</th>
        <th>User Name</th>
        <th>Options</th>

    </tr>
    @foreach ($user->anuncios as $anuncio)
    <tr align="center ">
        <td align="center ">{{ $anuncio->id }}</td>
        <td align="center ">{{ $anuncio->titulo }}</td>
        <td align="center ">{{ $anuncio->estado }}</td>
        <td align="center ">{{ $anuncio->descricao }}</td>
        <td align="center ">{{ $anuncio->user->name }}</td>
      <td> <form action="{{ url('anuncios/destroy/'.$anuncio->id) }}" method="POST">
            <a class="btn btn-primary" href="{{ url('anuncios/edit',$anuncio->id) }}">Edit</a>
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
    
    </form></td>
    </tr>
    @endforeach
</table> 
  
<br> </br>

<h5>Seus Comentarios</h5>

<table class="table table-bordered">
    <tr align="center ">
        <th align="center " >ID</th>
        <th align="center ">Descricao</th>
        <th align="center ">User Name</th>
        <th>Options</th>
    </tr>
    @foreach ($user->comentarios as $comentario)
    <tr>
        <td align="center ">{{ $comentario->id }}</td>
        <td align="center ">{{ $comentario->descricao }}</td>
        <td align="center ">{{ $comentario->user->name }}</td>
        <td align="center"><form action="{{ url('comentarios/destroy/'.$comentario->id) }}" method="POST">
            <a class="btn btn-primary" href="{{ url('comentarios/edit',$comentario->id) }}">Edit</a>
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
        </form></td>
      
    </tr>

    @endforeach
</table> 


 

</div>
@endsection