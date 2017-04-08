@extends('master')

@section('titulo','Agregar Deuda')

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
			<legend>Agregar Deuda a {{$cliente->nombre}} {{$cliente->apellido}}</legend>
			<form class="form" id="form" method="post" autocomplete="off">
				<fieldset>
					{{csrf_field()}}
					<input type="hidden" name="id_cliente" value="{{$cliente->id_cliente}}">

					<div class="form-group">
						<label class="control-label col-md-2"> Descripción:</label>
						<div class="col-md-9">
							<input type="text" placeholder="Ingrese descripción de deuda" for="descripcion" class="form-control" id="descripcion" name="descripcion">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2"> Valor:</label>
						<div class="col-md-9">
							<input type="text" placeholder="Ingrese valor de deuda" for="valor" class="form-control" id="valor" name="valor">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12 col-md-push-8">
							<div class="row">&nbsp;</div>
							<button type="submit" class="btn btn-success">Agregar Deuda</button>
							&nbsp;
						<a href="#" class="btn btn-warning">Cancelar</a>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
@endsection