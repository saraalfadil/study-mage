'use strict';

/* Controllers */

function CardsController($scope, $http, $routeParams, $location, $resultsService, dataFactory) {

  $scope.itemsPerPage = 1;
  $scope.results = false;
  $scope.loading = true;
  $scope.studyMessage = false;

  $scope.goTo = function (index) {
      if (index > 0 && index <= $scope.totalItems) {
          $scope.currentPage = index;
      }
      $scope.results = false;
  }

  $scope.loadCards = function() {
    dataFactory.getCourseCards()
      .success(function (data) {
        $scope.loading = false;
        $scope.cards = data;
        $scope.totalItems = $scope.cards.length;
        $scope.currentPage = 1;
        $scope.$watch('currentPage + itemsPerPage', function () {
             var begin = (($scope.currentPage - 1) * $scope.itemsPerPage),
               end = begin + $scope.itemsPerPage;

             $scope.filteredCards = $scope.cards.slice(begin, end);

             if($scope.cards.length == 0) {
                $scope.studyMessage = true;
             }
        });

      })
      .error(function (error) {
          $scope.status = 'Unable to load data: ' + error.message;
      });
  }

  $scope.loadCards();

  $scope.checkAnswer = function(user_answer) {
      $scope.results = true;
      var course_id = User.course_id;
      var card_id = $scope.cards[$scope.currentPage - 1].id;
      var question = $scope.cards[$scope.currentPage - 1].question;
      var answer = $scope.cards[$scope.currentPage - 1].answer;

      $scope.correctAns = user_answer.toUpperCase() === answer.toUpperCase();

      $http.put('/api/v1/courses/' + course_id + '/cards/' + card_id, {correct: $scope.correctAns}).
        success(function(data, status, headers, config) {
      }).
        error(function(data, status, headers, config) {
      });
  };

  $scope.viewResults = function () {
    $resultsService.setResults($scope.cards);
    $location.path( "/results" );
  }
}

CardsController.$inject = ['$scope', '$http', '$routeParams', '$location', 'resultsService', 'dataFactory'];

function ResultsController ($scope, $location, $resultsService) {
  $scope.results = $resultsService.getResults();

  $scope.closeModal = function() {
    $location.path('/');
  }
}

ResultsController.$inject = ['$scope', '$location', 'resultsService'];

