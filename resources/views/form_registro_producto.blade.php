@extends('master')

@section('titulo','Registro de productos')

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
			<legend>Registrar Nuevo Producto</legend>
			<form class="form" id="form" method="post" autocomplete="off">
				<fieldset>
					{{csrf_field()}}
					<div class="form-group">
						<label class="control-label col-md-3" for="nombre">Nombre:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="nombre" name="nombre">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" for="codigo">Código:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="codigo" name="codigo">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" for="descripcion">descripcion:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="descripcion" name="descripcion">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" for="precio_venta">Precio de Venta:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="precio_venta" name="precio_venta">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" for="precio_costo">Precio de Costo:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="precio_costo" name="precio_costo">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" for="stock">Stock:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="stock" name="stock">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="CAT">Categoría:</label>
						<div class="col-md-9">
							<select name="categoria" id="categoria" style="width: 300px">
							    <option>Seleccionar...</option>
							    <option value="bazar">Bazar</option>
							    <option value="ferreteria">Ferretería</option>
							</select>
						</div>
					</div>


					<div class="form-group">
						<div class="col-md-12 col-md-push-8">
							<div class="row">&nbsp;</div>
							<button type="submit" class="btn btn-success">Registrar</button>
							&nbsp;
						<a href="{{action('ProductosController@mostrarFormProducto')}}" class="btn btn-warning">Cancelar</a>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
@endsection