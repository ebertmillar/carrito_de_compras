@extends('layouts.app')

@section('content')


<div class="container">
	
	<div class="card">	
		@if(Auth::check() && $producto->user_id == Auth::user()->id)

			<div class="d-flex justify-content-end pt-3 pr-3">
					<a href="{{route('productos.edit', $producto->id)}}" class="btn btn-primary mr-2">editar</a>
               		@include('productos.delete')		
			</div>

		@endif
		<div class="card-header bg-white">
			<h1>{{$producto->titulo}}</h1>
		</div>
		
		<div class="row pt-2">
			<div class="col-sm-6 col-xs-12">
				
			</div>
			<div class="col-sm-6 col-xs-12">
				<p><strong>Descripción</strong></p>
				<p>{{$producto->descripcion}}</p>
				<p>
					
				</p>
			</div>
		</div>
	</div>

</div>

@endsection