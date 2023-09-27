<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <title>Study Mage | Conquer the CLEP Exam</title>
    {{ HTML::style('css/foundation.css'); }}
    {{ HTML::style('css/app-styles.css'); }}
    {{ HTML::script('js/vendor/modernizr.js'); }}
    <link href='http://fonts.googleapis.com/css?family=Viga' rel='stylesheet' type='text/css'>
  </head>

  <body id="login">

    <div id="wrapper">

        @if(Session::has('message'))
        <div class="row">
            <div data-alert class="alert-box success radius">
              <p class="alert">{{ Session::get('message') }}</p>
              <a href="#" class="close">&times;</a>
            </div>
        </div>
        @endif

        <div class="row">
          <div class="login-box large-4 columns large-centered">
              <div class="large-11 columns large-centered">
                <h2 class="heading">Study Mage</h2>
              </div>
              <div class="large-12 columns large-centered">
                @yield('content')
              </div>
          </div>
        </div>

    </div>


    {{ HTML::script('js/vendor/jquery.js'); }}
    {{ HTML::script('js/foundation.min.js'); }}
    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js'); }}
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
