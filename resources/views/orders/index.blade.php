@extends('layouts.app')

@section('content')

<div class="container">
	<div class="card">
		<div class="card-header" style="background-color: #2271e80a;">
			<h2 class="m-0">Dashboard</h2>
		</div>
		<div class="card-body">
			<h3>Estadisticas</h3>
			<div class="row mt-2 pt-2">
				<div class="col-xs-4 col-md-3 col-lg-2 d-block text-center"> 
					<span class="text-primary"><h2>{{$totalMonth}} EUR</h2></span>
					<p>Ingresos del mes</p>
				</div> 
				<div class="border-left col-xs-4 col-md-3 col-lg-2 d-block text-center"> 
					<span class="text-primary"><h2>{{$totalMonthCount}}</h2></span>
					<p>Número de ventas</p>
				</div>
			</div>
			<h3>Ventas</h3>
			<table class="table table-bordered">
				<thead>
					<tr>
						<td>ID. venta</td>
						<td>Comprador</td>
						<td>Dirección</td>
						<td>N° de guia</td>
						<td>Status</td>
						<td>Fecha de venta</td>
						<td>Acciones</td>
					</tr>
				</thead>
				<tbody>
					@foreach($orders as $order)
					<tr>
						<td>{{$order->id}}</td>
						<td>{{$order->recipient_name}}</td>
						<td>{{$order->address()}}</td>
						<td>
							<a href="#"
								data-type="text"
								data-pk="{{$order->id}}"
								data-url="{{url('/orders/'.$order->id)}}"
								data-title="Numero de guia"
								data-value="{{$order->guide_number}}"
								class="set-guide-number"
								data-name="guide_number">
								
							</a>
						<td>
							<a href="#"
								data-type="select"
								data-pk="{{$order->id}}"
								data-url="{{url('/orders/'.$order->id)}}"
								data-title="status"
								data-value="{{$order->status}}"
								class="select_status"
								data-name="status">
								
							</a>
						</td>
						</td>
						<td>{{$order->created_at}}</td>
						<td>{{}}</td>
					</tr>

					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection