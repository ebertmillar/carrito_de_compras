<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Hola!!</h1>
	<h3><p>Te mandamos los datos de tu compra reaizada en Decath</p></h3>
	<div class="table-responsive-sm">
	  <table class="table">
	    <thead>
	    	<tr>
	    		<th>Producto</th>
	    		<th>Monto</th>
	    	</tr>
	    </thead>
	    <tbody>
	    	@foreach($productos as $producto)
	    	<tr>
	    		<td>{{$producto->titulo}}</td>
	    		<td>{{$producto->precio}}</td>
	    	</tr>
	    	@endforeach
	    	<tr>
	    		<td>Total</td>
	    		<td>{{$order->total}}</td>
	    	</tr>

	    	
	    </tbody>
	  </table>
	</div>
</body>
</html>