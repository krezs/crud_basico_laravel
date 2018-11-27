			<div class="form-group">
				<label for="exampleInputEmail1">Nombre</label>
				<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del entrenador" 
				value="{{  isset($entrenador->nombre) ? $entrenador->nombre : '' }}">
			</div>
			<div class="form-group">
				<label for="exampleFormControlTextarea1">Descripción</label>
				<textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ isset($entrenador->descripcion) ? $entrenador->descripcion : '' }}</textarea>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Avatar</label>
				<input type="file" class="form-control-file" id="avatar" name="avatar" >
				<!--<small class="form-text text-danger">prueba2.</small>-->
			</div>
			<button type="submit" class="btn btn-primary">Guardar</button>