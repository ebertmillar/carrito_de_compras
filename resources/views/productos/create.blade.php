@extends('layouts.app')

@section('content')


<div class="container">
<form method="POST" action="{{ route('productos.store') }}">
    @csrf

  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre del productos</label>
    <input type="text" name="titulo" class="form-control" id="exampleFormControlInput1" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Descripción</label>
    <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="inputPrecio">Precio</label>
    <input type="text" name="precio" class="form-control" id="inputPrecio" placeholder="Precio">
  </div>

      <button type="submit" class="btn btn-primary">Registrar</button>

  </div>
  
</form>
</div>
@endsection