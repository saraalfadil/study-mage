@extends('layouts.master')

@section('content')

  <?php $cats = array('abstract', 'animals', 'business', 'cats', 'city', 'food', 'nightlife', 'fashion', 'people', 'nature', 'sports', 'technics', 'transport'); 
  $num = 0; ?>

  <div class="row heading-bar">
    <div class="large-12 columns">
      <h2>Exams</h2>
    </div>
  </div>

  <div class="row">
    <div class="large-9 columns inner-content">

    @if(Session::has('message'))
    <div class="row">
      <div data-alert class="alert-box success radius">
        <p class="alert">{{ Session::get('message') }}</p>
        <a href="#" class="close">&times;</a>
      </div>
    </div>
    @endif

      <div class="large-2 columns course-box new-exam left"> 
          <a href="/exams/create"><i class="fa fa-plus"></i></a>        
          <a href="/exams/create"><p>Create New Exam</p></a>  
      </div>

      @foreach ($exams as $exam)
        <?php $num++; ?>
        <div class="large-2 columns course-box left">
        {{ Form::open( array('route' => 'courses.store') ) }}  
          <img src="https://placehold.co/200/150/{{ array_key_exists($num, $cats) ? $cats[$num] : $cats[0] }}" />  
          <p>{{ substr($exam->name, 0, 22) }}...</p>
          <input type="hidden" value="{{ $exam->id }}" name="exam" />
          <input type="hidden" value="{{ Auth::user()->id }}" name="user" />
          <input type="submit" class="button" value="Add Exam" />
        {{ Form::close() }}
        </div>
      @endforeach

    </div>
  </div>
@stop