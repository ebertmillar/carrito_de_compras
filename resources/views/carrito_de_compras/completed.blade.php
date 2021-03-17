@extends('layouts.app')


@section('content')

	<header class="p-3 mb-2 bg-dark text-center text-white">
		<h1>COMPRA COMPLETADA</h1>
	</header>

	<div class="container">
		<div class="card p-3">
			<h3>Tu pago fue procesado <span class="{{$order->status}}">{{$order->status}}</span></h3>
			<h5><p class="text-size-2">Corrobora los detalles de tu envio</p></h5>


			<div class="">
				<div class="row pt-2 pl-4">
					<div class="col">Correo: </div>
					<div class="col">{{$order->email}}</div>
				</div>
				<div class="row pt-2 pl-4">
					<div class="col">Dirección: </div>
					<div class="col">{{$order->address()}}</div>
				</div>
				<div class="row pt-2 pl-4">
					<div class="col">Código Postal: </div>
					<div class="col">{{$order->postal_code}}</div>
				</div>
				<div class="row pt-2 pl-4">
					<div class="col">Ciudad: </div>
					<div class="col">{{$order->city}}</div>
				</div>
				<div class="row pt-2 pl-4">
					<div class="col">Estado y Pais: </div>
					<div class="col">{{$order->state}} {{$order->country_code}} </div>
				</div>
				<br>
				<hr>   
				<div class="text-center">
					<a href="{{url('/compras/'.$shopping_cart->customid) }}">Link permanente de tu compra</a>
				</div>
			</div>
		
		</div>
	</div>


@endsection