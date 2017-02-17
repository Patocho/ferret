@extends('master')

@section('titulo','Lista  de Productos')

@section('contenido')


<script type="text/javascript">
	var productos_filtrados=[];
	var productos=[];
</script>

<div class="container">
	<div class="col col-md-10">
		<legend style="font-weight: bold;font-size: 250%">Lista de Productos</legend>
	<div class="table-responsive">
	<form >
	<input class="form-control" onkeyup="filtrarProductos()" placeholder="filtrar por nombre codigo o descripcion" type="search" name="filtro" id="filtro">
	</form>
		@if($productos)
			<table id="table" class="table table-responsive table-striped table-bordered">
				<thead>
					<th id="cab">Nombre</th>
					<th id="cab">Código</th>
					<th id="cab">Descripción</th>
					<th id="cab">Precio Venta</th>
					<th id="cab">Stock</th>
					<th id="cab">Precio Costo</th>
					<th></th>
					<th></th>
				</thead>
			<tbody id="tbody">
				@foreach($productos as $prod)
							<script type="text/javascript">
								tmp_c={
									nombre:"{{$prod->nombre}}",
									codigo:"{{$prod->codigo}}",
									descripcion:"{{$prod->descripcion}}",
									precio_venta:"{{$prod->precio_venta}}",
									stock:"{{$prod->stock}}",
									precio_costo:"{{$prod->precio_costo}}",
								};
								productos.push(tmp_c);
							</script>
							
							<tr>
								<td>{{$prod->nombre}}</td>
								<td>{{$prod->codigo}}</td>
								<td>{{$prod->descripcion}}</td>
								<td id="cent">{{$prod->precio_venta}}</td>
								<td id="cent">{{$prod->stock}}</td>
								<td id="cent">{{$prod->precio_costo}}</td>

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
</div>


<script type="text/javascript">
	function filtrarProductos(){
		if($('#filtro').val()!=''){
			console.log($('#filtro').val());
			var url_="{{action('ProductosController@busquedaProductos','#VALUE')}}".replace('#VALUE',$('#filtro').val());
			console.log(url_);
			$.ajax(
				{
					url: url_,
					async: false,//importante
					success: function(result){
	        		productos_filtrados=JSON.parse(JSON.stringify(result));
	    		},error:function (xhr, ajaxOptions, thrownError) {
		        console.log(xhr.status);
		        console.log(thrownError);
	      		}
	    	});
	    	console.log(productos_filtrados);
	    	$("#table > tbody").empty();
	    	for(i in productos_filtrados){
	    		c=productos_filtrados[i];
	    		edit="#";
	    		info="#";
	    		row="<tr>";
	    		row+="<td>"+c.nombre+"</td>";
	    		row+="<td>"+c.codigo+"</td>";
	    		row+="<td>"+c.descripcion+"</td>";
	    		row+="<td id='cent'>"+c.precio_venta+"</td>";
	    		row+="<td id='cent'>"+c.stock+"</td>";
	    		row+="<td id='cent'>"+c.precio_costo+"</td>";
				row+="<td>";
				row+='<a class="btn btn-link" style="color:blue" href="#LINK">Información</a>'.replace("#LINK",info);
				row+="</td>";
				row+="<td>";
				row+='<a class="btn btn-link" style="color:green" href="#LINK">Editar</a>'.replace("#LINK",edit);
				row+="</td>";
	    		row+="</tr>";
	    		$("#table > tbody").append(row);
	    	}
		}else{
			$("#table > tbody").empty();
	    	for(i in productos){
	    		c=productos[i];
				edit="#";
	    		info="#";
	    		row="<tr>";
	    		row+="<td>"+c.nombre+"</td>";
	    		row+="<td>"+c.codigo+"</td>";
	    		row+="<td>"+c.descripcion+"</td>";
	    		row+="<td id='cent'>"+c.precio_venta+"</td>";
	    		row+="<td id='cent'>"+c.stock+"</td>";
	    		row+="<td id='cent'>"+c.precio_costo+"</td>";
				row+="<td>";
				row+='<a class="btn btn-link" style="color:blue" href="#LINK">Información</a>'.replace("#LINK",info);
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

