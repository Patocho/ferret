@extends('master')

@section('titulo','Ventas')

@section('contenido')
	<script type="text/javascript">
		var deudas = [];
		var subTotal = 0;
		var est =[];

	</script>

	<?php 
		$indice = 0;
	 ?>

    <div class="container" >
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
	</div>
	</div>

		<div class="well" >
			<legend style="font-weight: bold;font-size: 250%">{{$cliente->nombre}} {{$cliente->apellido}}</legend>
			<h3>Teléfono: {{$cliente->telefono}}</h2>
			<h3>Dirección: {{$cliente->direccion}}</h2>
			<h2>Comentario: {{$cliente->comentario}}</h2>
			<hr style="width:100%;">
			<a href="{{action('CuentasController@editar',$cliente->id_cliente)}}" class="btn btn-info">Editar Cliente</a>
			<a href="{{action('CuentasController@formDeuda',$cliente->id_cliente)}}" class="btn btn-warning">Agregar Deuda</a>

			<hr style="width:100%;">
			<form class="form" id="form" method="post" autocomplete="off">
				<fieldset>
					{{csrf_field()}}

					
					@if(isset($deudas)&&!$deudas->isEmpty())
						<table style="background-color: white" id="table" class="table table-responsive table-bordered table-hover">
							<thead>
								<th style="font-weight: bold;font-size: 130%">Descripción</th>
								<th style="font-weight: bold;font-size: 130%">Valor</th>
								<th style="font-weight: bold;font-size: 130%">Pagar</th>
							</thead>

							<tbody id="tbody">

								@foreach($deudas as $deuda)
								<tr>
									<td style="font-size: 120%">{{$deuda->descripcion}}</td>
									<td style="font-size: 120%">{{$deuda->valor}}</td>
									<td>
										<center>
											<input type="checkbox" onclick="sumar({{$indice}})" id="deuda" name="deuda[]" value={{$indice}}>
											<script type="text/javascript">
												tmp_c={
													indice: "{{$indice}}",
													id_deuda:"{{$deuda->id_deuda}}",
													valor:"{{$deuda->valor}}",
												};
												//console.log(tmp_c);
												deudas.push(tmp_c);
											</script>
											<?php
											$indice += 1;

											  ?>
										</center>
									</td>
								</tr>


								@endforeach
							</tbody>
						</table>
				@else
						<label class="col-md-12" style="font-weight: bold;font-size: 130%">No hay deudas pendientes</label>
				@endif
					<hr style="width:100%;">
					<label class="col-md-3" style="font-weight: bold;font-size: 150%" >Deuda Total: </label>
					<label class="col-md-9" style="font-weight: bold;font-size: 150%" id="total">{{$totalPagar}}</label>
					<label class="col-md-3" style="font-weight: bold;font-size: 150%" >Total a Pagar: </label>
					<label class="col-md-9" style="font-weight: bold;font-size: 150%" id="subtotal">0</label>

					<div class="form-group">
						<div class="col-md-12 col-md-push-8">
							<div class="row">&nbsp;</div>
							<button type="submit" class="btn btn-success">Registrar</button>
							&nbsp;
						<a href="#" class="btn btn-warning">Cancelar</a>
						</div>
					</div>
				</fieldset>
			</form>
		</div>

		<script type="text/javascript">
		subTotal=0;
		function sumar(variable){
			var i = est.indexOf( variable );

			if(est.includes(variable)){
				console.log("el valor ya existe en el arreglo");
				est.splice( i, 1 );
				subTotal -= parseInt(deudas[variable].valor);
			}
			else{
				console.log("el valor aun no esta en el arreglo");
				est.push(variable);
				subTotal += parseInt(deudas[variable].valor);
			}

			//console.log(est);
			//console.log(subTotal);
			$('#subtotal').html(subTotal);
		}	
		</script>
		

@endsection