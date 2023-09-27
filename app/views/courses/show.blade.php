@extends('layouts.master')

@section('content')
	
	<div class="row heading-bar">
		<div class="large-12 columns">
 			<h2 class="left">{{ $course->name() }}</h2>	

 			<ul class="button-group main-buttons left">
			  <li><a href="#" class="button small hide">Plan</a></li>
			  <li><a href="{{ $course->id }}/learn" class="button small">Learn</a></li>
			  <li><a href="{{ $course->id }}/study" class="button small">Study</a></li>
			  <li><a href="#" class="button small hide">Test</a></li>
			</ul>

		</div>
	</div>

	<div class="row">
		<div class="large-9 columns inner-content">

	    <div class="large-7 columns">
	      <div id="container"></div>

			 	<table class="section-table">
				    @foreach ($course->topics() as $topic)
				        <tr>
				        	<td><h6>{{ $topic['name'] }}</h6></td>
				        	<td style="width:45%;">
				        		<div class="progress" style="height: 1em;">
									<span class="meter" style="width: {{ $topic['progress'] }}%"></span>
								</div>
							</td>
				        	<td><i class="fa fa-book"></i> <i class="fa fa-pencil"></i> <i class="fa fa-bar-chart"></i></td>
				        </tr>
				    @endforeach
				</table>
			</div>

			<div class="large-5 columns">
				<div class="widget">
					<h5>Course Progress</h5>
					<div class="progress">
						<span class="meter" style="width: {{ $course->progress() }}%"></span>
					</div>
				</div>

				<div class="sub-widget widget">
					<span>Items ready to review: <a href="{{ $course->id }}/study" class="right">{{ $count }}</a></span>
					<span>Items mastered: <a href="{{ $course->id }}/study" class="right">{{ $mastered }}</a></span>
				</div>

				<div class="calendar widget">
					<?php 
						$data = array(
						    3  => 'http://example.com/news/article/2006/03/',
						    7  => 'http://example.com/news/article/2006/07/',
						    13 => 'http://example.com/news/article/2006/13/',
						    26 => 'http://example.com/news/article/2006/26/'
						);
					?>
					{{ Calendar::generate(2015, 4, $data); }}
				</div>
			</div>

		</div>

	</div>

@stop

@section('scripts')
	@parent
	{{ HTML::script('http://code.highcharts.com/highcharts.js'); }}
	{{ HTML::script('http://code.highcharts.com/modules/exporting.js'); }}
	<script>
	$(function () {
	    $('#container').highcharts({
	            chart: {
	                type: 'column',
	                marginLeft: 60,
	            },
	            title: {
	                text: 'Course Mastery'
	            },
	            xAxis: {
	                categories: ['Novice', 'Competent', 'Experienced', 'Pro', 'Master'],
	                labels: {
		                rotation: -45,
		                style: {
		                    fontSize: '13px',
		                    fontFamily: 'Verdana, sans-serif'
		                }
		            }
	            },
	            yAxis: {
	            	offset: -10,
	                title: {
	                    text: 'Cards'
	                }
	            },
	            plotOptions: {
	                line: {
	                    dataLabels: {
	                        enabled: true
	                    },
	                    enableMouseTracking: false
	                }
	            },
	            series: [{
	            	showInLegend: false,    
	                data: {{ $course->levels() }}
	            }]
	        });
	    });
	</script>
@stop