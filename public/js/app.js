'use strict';


// Declare app level module which depends on filters, services & directives
angular.module('study-app', ['study-app.filters', 'study-app.services', 'study-app.directives', 'ngRoute']).
  config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/', {templateUrl: '/js/templates/questions.html', controller: CardsController});
  $routeProvider.when('/results', {templateUrl:'/js/templates/results.html', controller:ResultsController});

  $routeProvider.otherwise({redirectTo:'/'});
}]);
