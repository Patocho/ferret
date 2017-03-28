@extends('master')

@section('titulo','Lista  de Clientes')

@section('contenido')


<script type="text/javascript">
	var clientes_filtrados=[];
	var clientes=[];
</script>

	<div class="well">
		<legend style="font-weight: bold;font-size: 250%">Lista de clientes</legend>
	<div class="table-responsive">
	<form >
	<input autofocus="autofocus" class="form-control" onkeyup="filtrarClientes()" placeholder="filtrar por nombre " type="search" name="filtro" id="filtro" >
	</form>
		@if($clientes)
			<table id="table" class="table table-responsive table-striped table-bordered">
				<thead>
					<th id="cab">Nombre</th>
					<th id="cab">Teléfono</th>
					<th id="cab">Dirección</th>
					<th id="cab"></th>
					<th id="cab"></th>
				</thead>
			<tbody id="tbody">
				@foreach($clientes as $cli)
							<script type="text/javascript">
								tmp_c={
									nombre:"{{$cli->nombre}}",
									telefono:"{{$cli->telefono}}",
									direccion:"{{$cli->direccion}}",
									
								};
								clientes.push(tmp_c);
							</script>
							
							<tr>
								<td>{{$cli->nombre}}</td>
								<td>{{$cli->telefono}}</td>
								<td>{{$cli->direccion}}</td>

								<td><a class="btn btn-link" style="color:blue" href="">Información</a></td>
								<td>
									<a class="btn btn-link" style="color:green" href="">Editar</a>
								</td>
							</tr>

				@endforeach	
			</tbody>

			</table>

		</div>
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
	    	console.log(clientes_filtrados);
	    	$("#table > tbody").empty();
	    	for(i in clientes_filtrados){
	    		c=clientes_filtrados[i];
	    		edit="#";
	    		info="#";
	    		row="<tr>";
	    		row+="<td>"+c.nombre+"</td>";
	    		row+="<td>"+c.telefono+"</td>";
	    		row+="<td>"+c.direccion+"</td>";
				row+="<td>";
				row+='<a class="btn btn-link" style="color:blue" href="#LINK">Informacion</a>'.replace("#LINK",info);
				row+="</td>";
				row+="<td>";
				row+='<a class="btn btn-link" style="color:green" href="#LINK">Editar</a>'.replace("#LINK",edit);
				row+="</td>";
	    		row+="</tr>";
	    		$("#table > tbody").append(row);
	    	}
		}else{
			$("#table > tbody").empty();
	    	for(i in clientes){
	    		c=clientes[i];
				edit="#";
	    		info="#";
	    		row="<tr>";
	    		row+="<td>"+c.nombre+"</td>";
	    		row+="<td>"+c.telefono+"</td>";
	    		row+="<td>"+c.direccion+"</td>";
				row+="<td>";
				row+='<a class="btn btn-link" style="color:blue" href="#LINK">Informacion</a>'.replace("#LINK",info);
				row+="</td>";
				row+="<td>";
				row+='<a class="btn btn-link" style="color:green" href="#LINK">Editar</a>'.replace("#LINK",edit);
				row+="</td>";
	    		row+="</tr>";
	    		$("#table > tbody").append(row);
	    	}
		}
	}
</script>


@endsection

