@extends('master')

@section('titulo','Editar Clientes')

@section('contenido')

<div class="container">
	<div class="col col-md-10">
		@if($errors->all())
		   <div class="alert alert-danger">
		   	Se han detectado los siguientes errores:
		   	<ul>
		   @foreach ($errors->all() as $error)
		     <li> {{ $error }}</li>
		  @endforeach
		  	</ul>
		  </div>
		@endif


		<div class="well">
			<legend>Editar Cliente</legend>
			<form class="form" id="form" method="post" autocomplete="off">
				<fieldset>
					{{csrf_field()}}
					<input type="hidden" name="id_cliente" value="{{$cliente->id_cliente}}">

					<div class="form-group">
						<label class="control-label col-md-2"> Nombre:</label>
						<div class="col-md-9">
							<input type="text" value="{{$cliente->nombre}}" for="nombre" class="form-control" id="nombre" name="nombre">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2"> Apellido:</label>
						<div class="col-md-9">
							<input type="text" value="{{$cliente->apellido}}" for="apellido" class="form-control" id="apellido" name="apellido">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2" for="telefono">Teléfono:</label>
						<div class="col-md-9">
							<input type="text" value="{{$cliente->telefono}}" class="form-control" id="telefono" name="telefono">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2" for="direccion">Dirección:</label>
						<div class="col-md-9">
							<input type="text" value="{{$cliente->direccion}}" class="form-control" id="direccion" name="direccion">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2"> Comentario:</label>
						<div class="col-md-9">
							<input type="text" value="{{$cliente->comentario}}" for="comentario" class="form-control" id="comentario" name="comentario">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12 col-md-push-8">
							<div class="row">&nbsp;</div>
							<button type="submit" class="btn btn-success">Guardar</button>
							&nbsp;
						<a href="#" class="btn btn-warning">Cancelar</a>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
@endsection