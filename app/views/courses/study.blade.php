<!doctype html>
<html lang="en" ng-app="study-app">
<head>
  <meta charset="UTF-8">
  <title></title>
    {{ HTML::style('css/foundation.css'); }}
    {{ HTML::style('css/foundation.calendar.css'); }}
    {{ HTML::style('css/app-styles.css'); }}
    {{ HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'); }}
    {{ HTML::script('js/vendor/modernizr.js'); }}
</head>

<body>
  @include('includes.navigation')
  
    <div id="wrapper" class="row full-width">
      @include('includes.sidebar')

      <div id="main" class="large-10 columns">
          
          <div class="row heading-bar">
            <div class="large-12 columns">
              <h2 class="left"><a href="/courses/{{ $course->id }}">{{ $course->name() }}</a></h2>

              <ul class="button-group main-buttons left">
                <li><a href="#" class="button small hide">Plan</a></li>
                <li><a href="/courses/{{ $course->id }}/learn" class="button small">Learn</a></li>
                <li><a href="/courses/{{ $course->id }}/study" class="button small">Study</a></li>
                <li><a href="#" class="button small hide">Test</a></li>
              </ul>
            </div>
          </div>

        <div class="row">
          <div class="large-9 columns inner-content ng-view"></div>
        </div>

      </div>
    </div>

    {{ HTML::script('js/vendor/jquery.js'); }}
    {{ HTML::script('js/foundation.min.js'); }}
    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js'); }}
    <script>
      $(document).foundation();
      var User = {
        course_id: {{ $course->id }}
      };
    </script>
  {{ HTML::script('//ajax.googleapis.com/ajax/libs/angularjs/1.4.0-beta.1/angular.js'); }}
  {{ HTML::script('https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular-route.min.js'); }}
  {{ HTML::script('js/app.js'); }}
  {{ HTML::script('js/services.js'); }}
  {{ HTML::script('js/controllers.js'); }}
  {{ HTML::script('js/filters.js'); }}
  {{ HTML::script('js/directives.js'); }}
</body>
</html>