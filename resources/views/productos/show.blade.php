@extends('layouts.app')

@section('content')


<div class="container">
	@include('productos.product', ['producto' => $producto])
</div>

@endsection