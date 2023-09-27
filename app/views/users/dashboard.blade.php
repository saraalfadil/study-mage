@extends('layouts.master')

@section('content')

	<?php $cats = array('abstract', 'animals', 'business', 'cats', 'city', 'food', 'nightlife', 'fashion', 'people', 'nature', 'sports', 'technics', 'transport'); 
	$num = 0; ?>

	<div class="row heading-bar" style="background-color: #F0F0F0;">
		<div class="large-12 columns">
			<h2 class="left">Manage Courses</h2>
		</div>
	</div>

	<div class="row heading-bar" style="background-color: #ddd;">
		<div class="large-12 columns">
		    <div class="options">
		    	<ul>
			    	<li><a href="#" class="grid_view"><i class="fa fa-th"></i></a></li>
			    	<li> &nbsp;<a href="#" class="list_view"><i class="fa fa-th-list"></i></a></li>
			    	<li style="display:none;"><input type="text" placeholder="Search..." class="search" /></li>
		    	</ul>
	      </div>
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

			<div id="gridView" class="row">
				@if(count($courses) > 0)
					@foreach ($courses as $course)
						<?php $num++; ?>
						<div class="large-2 columns course-box left">
							<a href="../courses/{{ $course->id}}"><img src="https://placehold.co/200/150/{{ array_key_exists($num, $cats) ? $cats[$num] : $cats[0] }}" /></a>
							<p><a href="../courses/{{ $course->id}}">{{ substr($course->name(), 0, 22) }}</a>
							<div class="progress" style="width:85%; margin-left:1em;height:15px;margin-top:10px;"><span class="meter" style="width:{{ $course->progress() }}%"></span></div>
						</div>
					@endforeach
				@else 
					<p>You do not have any courses started yet.</p>
				@endif
			</div>

			<div id="listView" class="large-12 columns user-course-table hide">
				@if(count($courses) > 0)
				<table class="user-courses">
						@foreach ($courses as $course)
						<?php $num++; ?>
						<tr>
								<td style="width:15%"><img src="https://placehold.co/200/150/{{ $cats[$num] }}" /></td>
								<td><a href="../courses/{{ $course->id}}">{{ $course->name() }}</a></td>
								<td><a class="button tiny"> {{ $course->status }}</a></td>
								<td style="width: 200px;"><div class="progress"><span class="meter" style="width:{{ $course->progress() }}%"></span></div></td>
								<td> 
									<i class="fa fa-eye"></i> 
									<i class="fa fa-pencil"></i> 
									<i class="fa fa-trash"></i>
								</td>
						</tr>
						@endforeach
				</table>
				@else 
					<p>You do not have any courses started yet.</p>
				@endif
			</div>

		</div>

	</div>

@stop