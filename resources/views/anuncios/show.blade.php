@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Anuncio</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('/anuncios') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Titulo:</strong>
            {{ $anuncio->titulo }}
        </div>
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nome Utilizadot:</strong>
            {{$anuncio->user->name }}
        </div>  
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Preco:</strong>
            {{ $anuncio->preco }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Estado:</strong>
            {{ $anuncio->estado }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descricao:</strong>
            {{ $anuncio->descricao }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Foto :</strong>
         
            <img src="{{asset('storage/images/'.$anuncio->path)}}" alt="{{$anuncio->name}}" name="image "width="300" height="auto"> <!-- //asset forma automatica de ir ao stoarge -->

        </div>
    </div>


    <!--
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>ID User:</strong>
            {{ $anuncio->user_id }}
        </div>
    </div>
-->
</div>
@endsection