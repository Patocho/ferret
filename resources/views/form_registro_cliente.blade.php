@extends('master')

@section('titulo','Registro de Clientes')

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
			<legend>Registrar Nuevo Cliente</legend>
			<form class="form" id="form" method="post" autocomplete="off">
				<fieldset>
					{{csrf_field()}}
					<div class="form-group">
						<label class="control-label col-md-2"> Nombre:</label>
						<div class="col-md-9">
							<input type="text" placeholder="Ingrese Nombre" for="nombre" class="form-control" id="nombre" name="nombre">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2"> Apellido:</label>
						<div class="col-md-9">
							<input type="text" placeholder="Ingrese Apellido" for="apellido" class="form-control" id="apellido" name="apellido">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2" for="telefono">Teléfono:</label>
						<div class="col-md-9">
							<input type="text" placeholder="Ingrese Teléfono (OPCIONAL)" class="form-control" id="telefono" name="telefono">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2" for="direccion">Dirección:</label>
						<div class="col-md-9">
							<input type="text" placeholder="Ingrese Dirección (OPCIONAL)" class="form-control" id="direccion" name="direccion">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2"> Comentario:</label>
						<div class="col-md-9">
							<input type="text" placeholder="Ingrese Comentario (OPCIONAL)" for="comentario" class="form-control" id="comentario" name="comentario">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12 col-md-push-8">
							<div class="row">&nbsp;</div>
							<button type="submit" class="btn btn-success">Registrar</button>
							&nbsp;
						<a href="{{action('ClientesController@mostrarFormCliente')}}" class="btn btn-warning">Cancelar</a>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
@endsection