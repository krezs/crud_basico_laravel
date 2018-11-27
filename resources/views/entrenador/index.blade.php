@extends('layouts.app')

@section('tittle','Listado')

@section('content')
<div class="row mt-5 ">

	@foreach ($entrenadores as $entrenador)
	<div class="col-sm mt-3 ">
		<div class="card" style="width: 18rem;">
			<img class="card-img-top" src="images/{{$entrenador->avatar}}" alt="{{$entrenador->nombre}}">
			<div class="card-body">
				<h5 class="card-title">{{$entrenador->nombre}}</h5>
				<p class="card-text">{{ str_limit($entrenador->descripcion , 150)}}</p>
				<div class="text-center">
					<a href="{{ route('entrenadores.show',$entrenador->slug) }}" class="btn btn-primary ">Ver más</a>
					<a  href="{{ route('entrenadores.edit',$entrenador->slug) }}" class="btn btn-info">Editar</a>
					<form action="{{ route('entrenadores.destroy', $entrenador->slug) }}" method="POST">
						@csrf
						@method('DELETE')
						<button class="btn btn-danger mt-2" type="submit" >Eliminar</button>
					</form>
				</div>				
			</div>
		</div>
	</div>
	@endforeach

</div>
@endsection