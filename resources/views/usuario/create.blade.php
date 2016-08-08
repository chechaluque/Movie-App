@extends('layouts.admin')

@section('content')
	@include('alerts.errors')
	{!! Form::open(['route'=>'usuario.store', 'method'=>'POST']) !!}
		@include('usuario.form.user')
		{!!Form::submit('Registrar', ['class'=>'btn btn-primary'])!!}
	{!! Form::close() !!}
	
@stop