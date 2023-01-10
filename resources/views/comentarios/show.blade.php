@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Comentarios</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('/comentarios') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descricao:</strong>
            {{ $comentario->descricao }}
        </div>
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nome Utilizador:</strong>
            {{ $comentario->user->name }}


          <!--  {{ Auth::user()->name }}-->
        </div>  
    </div>
    <!--
    <form action="{{ url('comentarios/destroy/'.$comentario->id) }}" method="POST">
            <a class="btn btn-primary" href="{{ url('comentarios/edit',$comentario->id) }}">Edit</a>
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
    </form>--> 

    <!--
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>ID User:</strong>
        </div>
    </div>
-->
</div>
@endsection