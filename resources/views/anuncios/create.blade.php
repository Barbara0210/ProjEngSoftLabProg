@extends('layouts.app')

@section('content')

<form action="{{url('/anuncios')}}" method="post" enctype="multipart/form-data">

        @csrf <!--medida segurança laravel-->
        Titulo: <input type="text" name="titulo" value="{{old('titulo')}}"> <!--old para quando tivermos erro a informaçao mantem se -->
        Preço: <input type="text" name="preco" value="{{old('preco')}}">
        Estado: <input type="text" name="estado" value="{{old('estado')}}">
        descricao: <input type="text" name="descricao" value="{{old('descricao')}}">
        <input type="file" name="image" placeholder="Choose image" id="image">
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