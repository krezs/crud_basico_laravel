@extends('layouts.app')

@section('tittle','Crear')

@section('content')
			<div class="row justify-content-md-center mt-5">
			<div class="col-6 form-group">
				<form method="POST" action="entrenadores">
					@csrf
					<div class="form-group">
						<label for="exampleInputEmail1">Nombre</label>
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del entrenador">
						<small id="emailHelp" class="form-text text-danger">prueba.</small>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
@endsection