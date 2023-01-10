@extends('layouts.app')

@section('content')

<form action="{{url('/comentarios')}}" method="post" enctype="multipart/form-data">

        @csrf <!--medida segurança laravel-->
       <h5>Comentario ao site</h5>
        Descricao: <input type="text" name="descricao" value="{{old('descricao')}}">
                @error('image')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
    <button type="submit" class="btn btn-primary"> Create Comentario ao site </button>
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