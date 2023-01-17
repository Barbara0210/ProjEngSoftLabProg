@extends('layouts.app')

@section('content')

<form action="{{url('/anuncios')}}" method="post" enctype="multipart/form-data">
       <h5> Criar novo Anuncio </h5>
@csrf <!--medida segurança laravel-->
        Titulo: <input type="text" class="col-md-4 col-form-label text-md-end" name="titulo" value="{{old('titulo')}}">   <br> </br>  <!--old para quando tivermos erro a informaçao mantem se -->
        Preço: <input type="text" class="col-md-4 col-form-label text-md-end" name="preco" value="{{old('preco')}}">  <br> </br> 
        Estado: <input type="text" class="col-md-4 col-form-label text-md-end" name="estado" value="{{old('estado')}}">  <br> </br> 
        Descricao: <input type="text" class="col-md-4 col-form-label text-md-end" name="descricao" value="{{old('descricao')}}">  <br> </br> 
        <input type="file" name="image" class="col-md-4 col-form-label text-md-end" placeholder="Choose image" id="image">  <br> </br> 
                @error('image')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
    <button type="submit" class="btn btn-primary"> Create anuncio </button>
</form>
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>  
@endif
@endsection 