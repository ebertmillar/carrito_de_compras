<form action="{{ route('productos.destroy',$producto->id) }}" method="POST">
	@csrf
	@method('DELETE')
	<button class="btn btn-danger" type="submit" id="eliminar"> 
		<i class="fas fa-thumbs-up mr-1"></i>Borrar
	</button>
</form>