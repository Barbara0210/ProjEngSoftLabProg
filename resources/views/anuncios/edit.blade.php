@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Anuncio</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('/anuncios') }}"> Back</a>
        </div>
    </div>
</div>


<form action="{{ url('anuncios/update/'.$anuncio->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Titulo:</strong>
                <input type="text" name="titulo" value="{{ $anuncio->titulo }}" class="form-control"
                    placeholder="Titulo">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Preço:</strong>
                <input type="text" name="preco" value="{{ $anuncio->preco }}" class="form-control"
                    placeholder="Preco">
            </div>  
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Estado:</strong>
                <input type="text" name="estado" value="{{ $anuncio->estado }}" class="form-control"
                    placeholder="Estado">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição:</strong>
                <input type="text" name="descricao" value="{{ $anuncio->descricao }}" class="form-control"
                    placeholder="Descricao">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto:</strong>
                <input type="file" name="image" placeholder="Choose image" id="image" value="{{ $anuncio->path }}" >

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection