@extends('layouts.master')

@section('content')

  <?php $cats = array('abstract', 'animals', 'business', 'cats', 'city', 'food', 'nightlife', 'fashion', 'people', 'nature', 'sports', 'technics', 'transport'); 
  $num = 0; ?>

  <div class="row heading-bar">
    <div class="large-12 columns">
      <h2>Update Exam</h2>
    </div>
  </div>

  <div class="row">
    <div class="large-9 columns inner-content">

      <div id="message" class="hide">
        <div data-alert class="alert-box success radius">
          <p class="alert"></p>
          <a href="#" class="close">&times;</a>
        </div>
      </div>

      {{ Form::open( array('route' => 'exams.update', "id" => "createExam") ) }}   

      {{ Form::text('name', $exam->name, array('id'=>'examName')) }}
      
      <h3>Update Cards</h3>
      <?php $i = 0; ?>
        @foreach($cards as $card)
          <div class="row exam-card">
            <div class="large-6 columns">
              <label>Question</label>
              <input type="text" class="question" name="question-<?php echo $i; ?>" value="{{$card->question}}" />
            </div>
            <div class="large-6 columns">
              <label>Answer</label>
              <input type="text" class="answer" name="answer-<?php echo $i; ?>" value="{{$card->answer}}" />
            </div>
          </div>
          <?php $i++; ?>
        @endforeach
      
      <input type="submit" value="Submit" />
      {{ Form::close() }}

    </div>
  </div>

@stop


@section('scripts')
  @parent
  <script>
  $(document).ready(function () {

    $("#createExam").submit(function(e) {
      e.preventDefault();

      var exam_name = $("#examName").val();
      var cards = [];

      $('.exam-card').each(function(){
          var question = $(this).find(".question").val();
          var answer = $(this).find(".answer").val();
          var card = {"question": question, 'answer': answer};

          cards.push(card);
      })

      $.ajax({
          url: '/exams/' + {{ $exam->id }},
          method: 'PUT',
          data: { name: exam_name, cards: cards},
          success: function (response) {
              var response = $.parseJSON(response);
              if(response.hasOwnProperty("success") && response.success == true) {
                var msg = response.hasOwnProperty.message && response.message.length ? response.message.length : '';
                $(".alert-box .alert").text(response.message);
                $("#message").show();
              }
          },
          error: function () {
             console.log("There was an error saving the cards");
          }
      });

    });

  });

  </script>
@stop
