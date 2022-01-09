<form action="{{ url('/carrito') }}" method="POST" class="inline-block">
	@csrf
	<input type="submit" value="Pagar " class="btn btn-dark text-white pl-3 pr-3">
</form>