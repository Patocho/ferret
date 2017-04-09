@extends('master')

@section('titulo','Clientes')

@section('contenido')

<script type="text/javascript">
	clientes=[];
	clientes_filtrados=[];
</script>

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


	</div>
</div>

	<div class="well">
		<legend style="font-weight: bold;font-size: 250%">Cuentas</legend>
		<form >
			<input autofocus="autofocus" class="form-control" placeholder="filtrar por nombre o rut" onkeyup="filtrarClientes()" type="search" name="filtro" id="filtro">
		</form>

		@if($clientes)
			<table id="table" class="table table-responsive table-striped table-bordered">
				<thead>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Dirección</th>
					<th>Teléfono</th>
					<th></th>
				</thead>

				<tbody id="tbody">

					@foreach($clientes as $cli)
					<script type="text/javascript">
						tmp_c={
							id_cliente:"{{$cli->id_cliente}}",
							nombre:"{{$cli->nombre}}",
							apellido:"{{$cli->apellido}}",
							direccion:"{{$cli->direccion}}",
							telefono:"{{$cli->telefono}}",
						};
						clientes.push(tmp_c);
					</script>
					<tr>
						<td>{{$cli->nombre}}</td>
						<td>{{$cli->apellido}}</td>
						<td>{{$cli->direccion}}</td>
						<td>{{$cli->telefono}}</td>
						<td>
							<center>
								<a type="button" class="btn btn-success" href="{{action('CuentasController@deudas',$cli->id_cliente)}}">Gestionar</a>
							</center>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		@else
			No existen clientes registrados
		@endif
	</div>
<script type="text/javascript">
	function filtrarClientes(){
		if($('#filtro').val()!=''){
			console.log($('#filtro').val());
			var url_="{{action('ClientesController@AJAX_busquedaClientes','#VALUE')}}".replace('#VALUE',$('#filtro').val());
			console.log(url_);
			$.ajax(
				{
					url: url_,
					async: false,//importante
					success: function(result){
	        		clientes_filtrados=JSON.parse(JSON.stringify(result));
	        		//console.log(clientes_filtrados);
	    		},error:function (xhr, ajaxOptions, thrownError) {
		        console.log(xhr.status);
		        console.log(thrownError);
	      		}
	    	});
	    	//console.log(clientes_filtrados);
	    	$("#table > tbody").empty();
	    	for(i in clientes_filtrados){
	    		c=clientes_filtrados[i];
	    		console.log(c.id_cliente);
	    		info="{{action('CuentasController@deudas','#VALUE')}}".replace('#VALUE',c.id_cliente);

	    		row="<tr>";
	    		row+="<td>"+c.nombre+"</td>";
	    		row+="<td>"+c.apellido+"</td>";
	    		row+="<td>"+c.direccion+"</td>";
	    		row+="<td>"+c.telefono+"</td>";
				row+="<td>";
				row+="<center>"
				row+='<a type="button" class="btn btn-success" href="#LINK">Gestionar</a>'.replace("#LINK",info);
				row+="</center>"
				row+="</td>";

	    		row+="</tr>";
	    		$("#table > tbody").append(row);
	    	}
		}else{
			$("#table > tbody").empty();
	    	for(i in clientes){
	    		c=clientes[i];
	    		info="{{action('CuentasController@deudas','#VALUE')}}".replace('#VALUE',c.id_cliente);
	    		row="<tr>";
	    		row+="<td>"+c.nombre+"</td>";
	    		row+="<td>"+c.apellido+"</td>";
	    		row+="<td>"+c.telefono+"</td>";
	    		row+="<td>"+c.direccion+"</td>";
				row+="<td>";
				row+="<center>"
				row+='<a type="button" class="btn btn-success" href="#LINK">Gestionar</a>'.replace("#LINK",info);
				row+="</center>"
				row+="</td>";
	    		row+="</tr>";
	    		$("#table > tbody").append(row);
	    	}
		}
	}
</script>

@endsection