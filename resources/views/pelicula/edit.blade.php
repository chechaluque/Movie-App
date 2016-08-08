@extends('layouts.admin')
	@section('content')
		@include('alerts.errores')
		  	{!!Form::open(['route'=>'pelicula.store', 'method'=>'POST','files' => true])!!}
		  		@include('pelicula.form.pelicula')
				{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
			{!!Form::close()!!}
	@endsection