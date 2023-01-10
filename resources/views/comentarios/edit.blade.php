@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Anuncio</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('/comentarios') }}"> Back</a>
        </div>
    </div>
</div>  


<form action="{{ url('comentarios/update/'.$comentario->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descricao:</strong>
                <input type="text" name="descricao" value="{{ $comentario->descricao }}" class="form-control"
                    placeholder="Titulo">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection