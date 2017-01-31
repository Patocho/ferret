@extends('master')

@section('titulo','Listaa  de Productos')

@section('contenido')


<script type="text/javascript">
	var productos_filtrados=[];
	var productos=[];
</script>

<div class="container">
	<div class="col col-md-10">
		<legend>Lista de productos</legend>
	<div class="table-responsive">
	<form >
	<input class="form-control" onkeyup="" placeholder="filtrar por nombre codigo o descripcion" type="search" name="filtro" id="filtro">
	</form>
		@if($productos)
			<table id="table" class="table table-responsive table-striped table-bordered">
				<thead>
					<th>Nombre</th>
					<th>Codigo</th>
					<th>Descripcion</th>
					<th>Precio Venta</th>
					<th>Stock</th>
					<th>Precio Costo</th>
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
								<td>{{$prod->precio_venta}}</td>
								<td>{{$prod->stock}}</td>
								<td>{{$prod->precio_costo}}</td>

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


@endsection

