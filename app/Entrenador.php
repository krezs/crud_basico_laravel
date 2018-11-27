<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrenador extends Model
{
	protected $table="entrenadores";
	protected $fillable=['nombre','descripcion','avatar'];
	public function getRouteKeyName()
	{
		return 'slug';
	}

}
