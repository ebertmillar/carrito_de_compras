<div class="card mb-3">	
		@if(Auth::check() && $producto->user_id == Auth::user()->id)

			<div class="d-flex justify-content-end pt-3 pr-3">
					<a href="{{route('productos.edit', $producto->id)}}" class="btn btn-primary mr-2">editar</a>
               		@include('productos.delete')		
			</div>

		@endif
		<div class="card-header bg-white">
			<h1>{{$producto->titulo}}</h1>
		</div>
		
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				@if($producto->extension)
				<img src='{{url("/productos/images/$producto->id.$producto->extension")}}' class="product-image">


				@endif
			</div>
			<div class="col-sm-6 col-xs-12 ">
				<p class="mt-2"><strong>Descripción:</strong></p>
				<p>{{$producto->descripcion}}</p>
				<p><strong>Precio:</strong></p>
				<p>{{$producto->precio}} €</p>
				<p class="pt-2">
					@include("en_carrito_de_compras.form", ['producto' => $producto])
				</p>
			</div>
		</div>
	</div>