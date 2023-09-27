@extends('layouts.user')

@section('content')
	
	{{ Form::open(array('route'=>'login')) }}
	 
	    {{ Form::text('email', null, array('placeholder'=>'Email Address')) }}
	    {{ Form::password('password', array('placeholder'=>'Password')) }}
	 
	    {{ Form::submit('Login', array('class'=>'button'))}}
	{{ Form::close() }}

@stop