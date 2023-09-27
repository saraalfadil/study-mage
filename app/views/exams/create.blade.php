@extends('layouts.master')

@section('content')

  <?php $cats = array('abstract', 'animals', 'business', 'cats', 'city', 'food', 'nightlife', 'fashion', 'people', 'nature', 'sports', 'technics', 'transport'); 
  $num = 0; ?>

  <div class="row heading-bar">
    <div class="large-12 columns">
      <h2 class="left">Create New Exam</h2>
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

      {{ Form::open( array('route' => 'exams.store', "id" => "createExam") ) }}  

      <input type="text" name="name" id="examName" placeholder="Exam Name" />
      
      <label>Select Exam Category</label>
      <select name="categories" id="categories">
        <option value="">Select Category</option>
      </select>

      <h3>Create Cards</h3>
      @for($i = 0; $i < 5; $i++)
        <div class="row exam-card">
          <div class="large-6 columns">
            <label>Question</label>
            <input type="text" class="question" name="question-<?php echo $i; ?>" value="" />
          </div>
          <div class="large-6 columns">
            <label>Answer</label>
            <input type="text" class="answer" name="answer-<?php echo $i; ?>" value="" />
          </div>
        </div>
      @endfor
      
      <input type="submit" value="Submit" />
      {{ Form::close() }}

    </div>
  </div>

@stop


@section('scripts')
  @parent
  <script>
  $(document).ready(function () {

      var loadCategories = function() {

      $.ajax({
          url: 'http://studymage.dev/api/v1/categories',
          method: 'GET',
          success: function (response) {
              if(response.hasOwnProperty("success") && response.success == true) {
                var data = response.hasOwnProperty('data') && response.data.length ? response.data : [];
                var $select = $('#categories');                      
                $.each(data,function(key, value) {
                  $select.append('<option value="' + value.id + '">' + value.name + '</option>');
                });
              }
          },
          error: function () {
             console.log("There was an error fetching the exam categories");
          }
      });

    }

    loadCategories();


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
          url: '/exams',
          method: 'POST',
          data: { name: exam_name, cards: cards},
          success: function (response) {
              var response = $.parseJSON(response);
              if(response.hasOwnProperty("success") && response.success == true) {
                var msg = response.hasOwnProperty('message') && response.message.length ? response.message : '';
                $(".alert-box .alert").text(msg);
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
