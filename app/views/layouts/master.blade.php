<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Study Mage</title>

    {{ HTML::style('css/foundation.css'); }}
    {{ HTML::style('css/app-styles.css'); }}
    {{ HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'); }}
    {{ HTML::script('js/vendor/modernizr.js'); }}
  </head>

  <body>

  @include('includes.navigation')

    <div id="wrapper" class="row full-width">
      @include('includes.sidebar')

      <div id="main" class="large-10 columns left">
  	   	@yield('content')
      </div>
    </div>

    @section('scripts')
    {{ HTML::script('js/vendor/jquery.js'); }}
    {{ HTML::script('js/foundation.min.js'); }}
    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js'); }}
    {{ HTML::script('js/functions.js'); }}
    <script>
      $(document).foundation();
    </script>
    @show
  </body>
</html>
