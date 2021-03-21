@extends('layouts.app')

@section('content')

<div class="p-3 mb-2 bg-dark text-center text-white">
  <h1>Carrito de compras</h1>
</div>      
<div class="container">
   <div class="table-responsive ">
     <table class="table table-bordered">
       <thead class="thead-dark">
         <tr>
           <th>Producto</th>
           <th>Precio</th>
         </tr>
       </thead>
       <tbody class="bg-white">
           @foreach($productos as $producto)
           <tr>
             <td> {{ $producto->titulo }}</td>
             <td> {{ $producto->precio }}</td>
           </tr>
           @endforeach
           <tr class="bg-dark text-white">
           	<td >Total</td>
           	<td>{{$total}}</td>
           </tr>
        </tbody>    
      </table>
      <div class="text-right">
          @include('carrito_de_compras.form')
      </div>
    </div>
  </div>

@endsection