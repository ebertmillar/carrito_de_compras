@extends('layouts.app')

@section('content')

<div class="p-3 mb-2 bg-dark text-center text-white">
  <h1>PRODUCTOS</h1>
</div>      
    <div class="container">
       <div class="table-responsive ">
         <table class="table table-bordered">
           <thead class="thead-dark">
             <tr>
               <th>Id</th>
               <th>Titulo</th>
               <th>Descripción</th>
               <th>Precio</th>
               <th></th>
               <th></th>
               <th></th>
             </tr>
           </thead>
           <tbody class="bg-white">
               @foreach($productos as $producto)
                <tr>
                 
                   <td> {{ $producto->id }}</td>
                   <td>{{ $producto->titulo }}</td>
                   <td> {{ $producto->descripcion }}</td>
                   <td> {{ $producto->precio }}</td>
                   <td><a href="{{route('productos.show',$producto->id)}}" class="btn btn-success">ver</a></td>
                   <td> <a href="{{route('productos.edit', $producto->id)}}" class="btn btn-primary">editar</a></td>
                   <td> @include('productos.delete')</td>
                 
                </tr>  
               @endforeach
            </tbody>    
          </table>
        </div>
      </div>


@endsection


