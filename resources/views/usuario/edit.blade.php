@extends('layouts.admin')
@section('content')
		@include('alerts.errors')
		{!! Form::model($user,['route'=>['usuario.update', $user->id], 'method'=>'PUT']) !!}
		@include('usuario.form.user')
		{!!Form::submit('Actualizar', ['class'=>'btn btn-primary'])!!}
	{!! Form::close() !!}

	{!! Form::open(['route'=>['usuario.destroy', $user->id], 'method'=>'DELETE']) !!}
		
		{!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!}
	{!! Form::close() !!}
@stop