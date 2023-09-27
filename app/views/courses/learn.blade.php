@extends('layouts.master')

@section('content')

<?php if (Request::is('*learn')){ $class = 'secondary'; } ?>

	<div class="row heading-bar" style="background-color: #F0F0F0;">
		<div class="large-12 columns">
			<h2 class="left"><a href="/courses/{{ $course->id }}">{{ $course->name() }}</a></h2>

			<ul class="button-group main-buttons left">
				<li><a href="#" class="button small hide">Plan</a></li>
				<li><a href="/courses/{{ $course->id }}/learn" class="button small {{ $class }}">Learn</a></li>
				<li><a href="/courses/{{ $course->id }}/study" class="button small">Study</a></li>
				<li><a href="#" class="button small hide">Test</a></li>
			</ul>
		</div>
	</div>

	<div class="row heading-bar" style="background-color: #ddd;">
		<div class="large-12 columns">
		    <div class="options">
		    	<ul>
			    	<li><a href="#" class="grid_view"><i class="fa fa-th"></i></a></li>
			    	<li> &nbsp;<a href="#" class="list_view"><i class="fa fa-th-list"></i></a></li>
			    	<li><span>&nbsp;|&nbsp;</span></li>
			    	<li>Filter: </li>
			    	<li>
				    	<a class="filter-level" data-dropdown="drop1" aria-controls="drop1" aria-expanded="false">Level <i class="fa fa-caret-down"></i></a>
						<ul id="drop1" class="f-dropdown" data-dropdown-content aria-hidden="true" tabindex="-1">
						  <li><a href="#" data-level="5">5 - Mastered</a></li>
						  <li><a href="#" data-level="4">4 - Pro</a></li>
						  <li><a href="#" data-level="3">3 - Experienced</a></li>
						  <li><a href="#" data-level="2">2 - Competent</a></li>
						  <li><a href="#" data-level="1">1 - Novice</a></li>
						  <li><a href="#" data-level="all">All</a></li>
						</ul>
					</li>
		    	</ul>
	        </div>
		</div>
	</div>

	<div class="row">
		<div class="large-9 columns inner-content">
			<div id="gridView" class="row box">
				@if(count($cards) > 0)
				    @foreach ($cards as $card)
				        <div class="large-3 columns left card">
				        	<div class="card-answer">{{ $card['answer'] }}</div>
				       		<p>{{ $card['question'] }}</p>
				       		<div class="levels">
				       			<div class="left">
				       				@if($card['hours']) 
				       					<i class="fa fa-clock-o"></i> <span class="hours">{{ $card['hours'] }} hrs</span>
				       				@endif
				       			</div>
				       			<div class="right">
						       		@for ($i = 0; $i < $card['level']; $i++)
									    <i class="fa fa-diamond"></i>
									@endfor
								</div>
							</div>
				        </div>
				    @endforeach
			    @else 
					<p>There are no cards at the moment.</p>
				@endif
			</div>

			<div id="listView" class="row box hide">
				<table class="section-table">
					@if(count($cards) > 0)
					    @foreach ($cards as $card)
					        <tr>
					        	<td><b>{{ $card['answer']}}</b></td>
					        	<td>{{ $card['question'] }}</td>
					        	<td><i class="fa fa-book"></i> <i class="fa fa-pencil"></i> <i class="fa fa-bar-chart"></i></td>
					        </tr>
					    @endforeach
					@else 
						<p>There are no cards at the moment.</p>
					@endif
				</table>
			</div>

		</div>
	</div>

@stop

@section('scripts')
	@parent
	<script>
	$(function () {
		var cards = <?php echo json_encode($cards); ?>;	

		$(".f-dropdown li a").on("click", function() {
			var level = $(this).data("level");
			var html = '';

			for(var i = 0; i < cards.length; i++) {
				var card = cards[i];

				if(level != "all" && level == card.level || level == "all") {
					var badges = '';
					for(var j = 0; j < card.level; j++) {
					    badges += '<i class="fa fa-diamond"></i>';
					}

			        html += '<div class="large-3 columns left card">' +
			        	'<div class="card-answer">' + card.answer + '</div>' +
			       		'<p>' + card.question +'</p>' +
			       		'<div class="levels">' +
			       			'<div class="left"><i class="fa fa-clock-o"></i> <span class="hours">' + card.hours + ' hrs</span></div>' +
			       			'<div class="right">' + badges + '</div>' +
						'</div>' +
			        '</div>';
				}

			}

			$("#gridView").html(html);
		});
	});

	</script>
@stop

