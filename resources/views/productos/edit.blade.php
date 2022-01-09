@extends('layouts.app')

@section('content')


<div class="container">

<form method="POST" action="{{route('productos.update', $producto->id)}}">
    @csrf
    @method('PUT')


  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre del productos</label>
    <input type="text" name="titulo" class="form-control" id="exampleFormControlInput1" value="{{ old('titulo' , $producto->titulo) }}">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Descripción</label>
    <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1" rows="3"> {{ old('descripcion' ,  $producto->descripcion) }}</textarea>
  </div>
  <div class="form-group">
    <label for="inputPrecio">Precio</label>
    <input type="text" name="precio" class="form-control" id="inputPrecio" value="{{ old('precio', $producto->precio) }}">
  </div>

      <button type="submit" class="btn btn-primary">Actualizar</button>

  </div>
  
</form>
</div>
@endsection