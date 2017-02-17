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
			<legend style="font-weight: bold;font-size: 250%">Registrar Nuevo Producto</legend>
			<form class="form" id="form" method="post" autocomplete="off">
				<fieldset>
					{{csrf_field()}}
					<div class="form-group">
						<label class="control-label col-md-2" for="nombre" style="font-weight: bold;font-size: 110%">Nombre:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="nombre" name="nombre">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2" for="codigo" style="font-weight: bold;font-size: 100%">Código:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="codigo" name="codigo">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2" for="descripcion" style="font-weight: bold;font-size: 100%">Descripción:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="descripcion" name="descripcion">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2" for="precio_venta" style="font-weight: bold;font-size: 100%">Precio de Venta:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="precio_venta" name="precio_venta">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2" for="precio_costo" style="font-weight: bold;font-size: 100%">Precio de Costo:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="precio_costo" onkeyup="calcularPrecio()" name="precio_costo">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2" for="stock" style="font-weight: bold;font-size: 100%">Stock:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="stock" name="stock">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-2" for="CAT" style="font-weight: bold;font-size: 100%">Categoría:</label>
						<div class="col-md-10">
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
				<legend>Datos Calculables</legend>
				<fieldset>
					<div class="col-md-4">
						<label class="col-md-5" style="font-weight: bold;font-size: 110%">IVA(%)</label>
						<input class="col-md-3" type="text" name="iva" id="iva" value="19">
					</div>

					<div class="col-md-8">
						<label class="col-md-4" style="font-weight: bold;font-size: 110%">Precio+IVA = </label>
						<label class="col-md-4" name="precioiva" id="precioiva" style="font-weight: bold;font-size: 110%"></label>
						
					</div>
					<br>
					</br>
					<br>
					</br>
					<div class="col-md-4">
						<label class="col-md-5" style="font-weight: bold;font-size: 110%">Ganancia(%)</label>
						<input class="col-md-3" type="text" name="ganancia" id="ganancia" value="35">
					</div>
					<div class="col-md-8">
						<label class="col-md-4" style="font-weight: bold;font-size: 110%">Precio+Ganancia = </label>
						<label class="col-md-4" id="total" name="total" style="font-weight: bold;font-size: 110%"></label>
						
					</div>



				</fieldset>
			</form>
		</div>

		<script type="text/javascript">
			function calcularPrecio(){
				var costo=$('#precio_costo').val();
				var iva =$('#iva').val;
				var ganancia =$('#ganancia').val;

				if($('#precio_costo').val()!=''){

					$('#precioiva').html(parseInt(costo+(1+(iva/100))  ));
				}
				else{
					$('#total').html(0);
				}

			}



		</script>
@endsection