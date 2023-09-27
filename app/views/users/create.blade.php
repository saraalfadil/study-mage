@extends('layouts.user')

@section('content')

  {{ Form::open(array('route'=>'register')) }}

    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    <div class="row">
        <div class="large-6 columns">
            {{ Form::text('first_name', null, array('placeholder'=>'First Name')) }}
        </div>
        <div class="large-6 columns">
            {{ Form::text('last_name', null, array('placeholder'=>'Last Name')) }}
        </div>
    </div>
    {{ Form::label('email', 'E-Mail') }}
    {{ Form::text('email', null, array('placeholder'=>'Email Address')) }}
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', array('placeholder'=>'Password')) }}
    {{ Form::label('password_confirmation', 'Password Confirmation') }}
    {{ Form::password('password_confirmation', array('placeholder'=>'Confirm Password')) }}

    {{ Form::submit('Sign Up', array('class'=>'button'))}}
  {{ Form::close() }}

@stop