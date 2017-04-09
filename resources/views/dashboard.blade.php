@extends('master')

@section('titulo','Dashboard')

@section('contenido')
    <div class="well">
    	<div class="col-md-8">
    		<h1>Deudas Totales: {{$total}}</h1>
    	</div>
    	<hr>

    </div>
@endsection