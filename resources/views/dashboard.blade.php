@extends('master')

@section('titulo','Dashboard')

@section('contenido')
    <div class="well">
    	
    		<h1>Deudas Totales: {{$total}}</h1>
    		<hr>
    		<h1>Numero de Deudas: {{$deudas->count()}}</h1>
    	
    </div>
@endsection