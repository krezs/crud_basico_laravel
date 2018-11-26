@extends('layouts.app')

@section('tittle','Editar')

@section('content')
<div class="row justify-content-md-center mt-5">
	<div class="col-6 form-group">
		<form method="POST" action="{{ route('entrenadores.update',$entrenador->slug) }}" enctype="multipart/form-data">
			@method('PUT')
			@csrf
			<div class="form-group">
				<label for="exampleInputEmail1">Nombre</label>
				<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del entrenador" value="{{$entrenador->nombre}}">
			</div>
			<div class="form-group">
				<label for="exampleFormControlTextarea1">Descripción</label>
				<textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{$entrenador->descripcion}}</textarea>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Avatar</label>
				<input type="file" class="form-control-file" id="avatar" name="avatar" >
				<!--<small class="form-text text-danger">prueba2.</small>-->
			</div>
			<button type="submit" class="btn btn-primary">Actualizar</button>
		</form>
	</div>
</div>
@endsection