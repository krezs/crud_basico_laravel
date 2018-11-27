@extends('layouts.app')

@section('tittle','Entrenador - ')

@section('content')
<div class="row mt-5">
	@include('common.success')
	<div class="col-3">
		<img class="img-thumbnail" src="../images/{{$entrenador->avatar}}" alt="{{$entrenador->nombre}}">
		<a  href="{{ route('entrenadores.edit',$entrenador->slug) }}" class="btn btn-primary btn-block">Editar</a>

	</div>
	<div class="col-9 ">
		<div class="col-12 text-center">{{$entrenador->nombre}}</div>
		<div class="col-12 mt-3">{{$entrenador->descripcion}}</div>
	</div>
</div>
@endsection