@extends('layouts.app')

@section('tittle','Crear')

@section('content')
<div class="row justify-content-md-center mt-5">
	<div class="col-6 form-group">
		<form method="POST" action="{{ route('entrenadores.store') }}" enctype="multipart/form-data">
			@csrf
			@include('entrenador.formulario')
		</form>

		@if ($errors->any())
		<div class="alert alert-danger mt-2">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
	</div>

</div>
@endsection