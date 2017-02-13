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
						<label class="control-label col-md-3"> Nombre:</label>
						<div class="col-md-9">
							<input type="text" placeholder="Ingrese nombre completo" for="nombre" class="form-control" id="nombre" name="nombre">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" for="telefono">Telefono:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="telefono" name="telefono">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" for="direccion">Dirección:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="direccion" name="direccion">
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