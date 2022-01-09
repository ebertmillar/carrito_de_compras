@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-sm">
    	@foreach ($productos as $producto)

	    	@include('productos.product', ['producto' => $producto])

    	@endforeach
    </div>
  </div>
    <nav aria-label="Page navigation example">
    	<ul class="pagination">
    	{{$productos->links()}}
	    </ul>
    </nav>
</div>

@endsection
