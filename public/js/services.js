'use strict';

/* Services */
angular.module('study-app.services', [])
  .service('resultsService', function (){
     var _cards;
    return {
      setResults: function(cards) {
        _cards = cards;
      },
      getResults: function (){
        return _cards;
      }
    };
  });

angular.module('study-app')
    .factory('dataFactory', ['$http', function($http) {
    var course_id = User.course_id;
    var urlBase = '/api/v1/courses/' + course_id + '/cards?review=1';
    var dataFactory = {};

    /*dataFactory.getQuestion = function (id) {
        var questions = $http.get('/api/v1/exams/' + course_id + '/cards');
        return questions[id];
    };*/

    dataFactory.getCourseCards = function (id) {
        return $http.get(urlBase);
    };

    return dataFactory;
}]);