@extends('layouts.app')

@section('content')


<div class="container">
    <form method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="exampleFormControlInput1">Nombre del producto</label>
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
        
        <label for="inputPrecio">Seleccionar Imagen</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFileLang" lang="es" name ="cover">
            <label class="custom-file-label" for="customFileLang"></label>
        </div>
        <div class="form-group">
          
        </div>

        <button type="submit" class="btn btn-primary">Registrar</button>
        
            

    </div>

</form>
</div>
@endsection