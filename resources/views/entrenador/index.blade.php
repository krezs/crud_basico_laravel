@extends('layouts.app')

@section('tittle','Listado')

@section('content')
<div class="row mt-5">

	@foreach ($entrenadores as $entrenador)
	<div class="col-sm">
		<div class="card" style="width: 18rem;">
			<img class="card-img-top" src="images/{{$entrenador->avatar}}" alt="{{$entrenador->nombre}}">
			<div class="card-body">
				<h5 class="card-title">{{$entrenador->nombre}}</h5>
				<p class="card-text">{{ str_limit($entrenador->descripcion , 150)}}</p>
				<div class="text-center">
					<a href="entrenadores/{{$entrenador->slug}}" class="btn btn-primary ">Ver más</a>
				</div>				
			</div>
		</div>
	</div>
	@endforeach

</div>
@endsection