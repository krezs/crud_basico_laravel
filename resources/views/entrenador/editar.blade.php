@extends('layouts.app')

@section('tittle','Editar')

@section('content')
<div class="row justify-content-md-center mt-5">
	<div class="col-6 form-group">
		<form method="POST" action="{{ route('entrenadores.update',$entrenador->slug) }}" enctype="multipart/form-data">
			@method('PUT')
			@csrf
			@include('entrenador.formulario')
		</form>
			@include('common.errors')
	</div>
</div>
@endsection