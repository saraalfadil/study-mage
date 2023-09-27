@extends('layouts.front')

@section('slideshow')
    <div id="slideshow">
    	<div class="row">
	        <div class="large-7 columns large-centered">
	          <h1>Conquer the CLEP</h1>
	          <h4>Study smarter. Finish college faster. Save money.</h4>
	          {{ Form::submit('Get Started Now', array('class'=>'button register-btn'))}}
	        </div>
   	 	</div>
    </div>
@stop

@section('content')
      
<?php 
$cats = array('abstract', 'animals', 'business', 'cats', 'city', 'food', 'nightlife', 'fashion', 'people', 'nature', 'sports', 'technics', 'transport'); 
$count = 0;
?>

<?php $exams = Exam::all(); ?>

<div class="row-full">
	<div id="carousel">
	@foreach ($exams as $exam)
	  <?php $count++; ?>
	    <div class="course-box">
	      <img src="https://placehold.co/200/150/{{ array_key_exists($count, $cats) ? $cats[$count] : $cats[0] }}">        
	      <p>{{ substr($exam->name, 0, 21) }}...</p>
	    </div>
	@endforeach
	</div>
</div>

@stop
