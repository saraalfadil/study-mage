@extends('layouts.master')

@section('content')

  {{ Form::open(array('url'=>'users/edit', 'class'=>'form-edit')) }}
    <h2 class="form-signup-heading">Edit Settings</h2>

    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    {{ Form::text('first_name', Auth::user()->first_name, array('class'=>'input-block-level')) }}
    {{ Form::text('last_name', Auth::user()->last_name, array('class'=>'input-block-level')) }}
    {{ Form::text('email', Auth::user()->email, array('class'=>'input-block-level')) }}
    <input type="password" name="password" value="{{ Auth::user()->first_name }}" />

    {{ Form::submit('Save', array('class'=>'button'))}}
  {{ Form::close() }}

@stop