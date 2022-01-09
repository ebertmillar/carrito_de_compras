<form action="{{ route('in_shopping_carts.store') }}" method="POST">
	@csrf
	<input type="hidden" name="producto_id" value="{{$producto->id}}">
	<input type="submit" value="Agregar al carrito" class="btn btn-success">
	
</form>