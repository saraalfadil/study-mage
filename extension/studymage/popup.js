$(document).ready(function () {

  var loadExams = function() {

    $.ajax({
        url: 'http://studymage.dev/api/v1/exams',
        method: 'GET',
        success: function (response) {
            if(response.hasOwnProperty("success") && response.success == true) {
              var data = response.hasOwnProperty('data') && response.data.length ? response.data : [];
              var $select = $('#exams');                        
              //$select.find('option').remove();               
              $.each(data,function(key, value) {
                $select.append('<option value="' + value.id + '">' + value.name + '</option>');
              });
            }
        },
        error: function () {
           console.log("There was an error getting the exams");
        }
    });

  }

  loadExams();

  $("#createCard").submit(function(e) {
      e.preventDefault();

      var exam_id = $("#exams").val();
      var question = $("#question").val();
      var answer = $("#answer").val();

      $.ajax({
          url: 'http://studymage.dev/api/v1/exams/' + exam_id + '/cards',
          method: 'POST',
          data: { 'question': question, 'answer': answer },
          success: function (response) {
              if(response.hasOwnProperty("success") && response.success == true) {
                var msg = response.hasOwnProperty('message') && response.message.length ? response.message : '';
                $("#message").text(msg);
                $("#message").show();
              }
          },
          error: function () {
             console.log("There was an error saving the cards");
          }
      });

    });

});