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
    {{ HTML::style('css/foundation.calendar.css'); }}
    {{ HTML::style('css/styles.css'); }}
    {{ HTML::script('js/vendor/modernizr.js'); }}
    {{ HTML::script('http://fonts.googleapis.com/css?family=Viga'); }}
  </head>

  <body>

    <div id="wrapper">

      <div class="nav">
        <nav class="top-bar row" data-topbar>
          <ul class="title-area">
            <li class="name">
              <h1><a href="/">Study Mage</a></h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
          </ul>

          <section class="top-bar-section">
            <ul class="right">
              @if (Auth::check())
                <li><a href="">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a></li>
                <li><a href="/logout">Logout</a></li>
              @else
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Sign Up</a></li>  
              @endif  
            </ul>
          </section>
        </nav>
      </div>

      @yield('slideshow')

      @if(Session::has('message'))
      <div class="row">
          <div data-alert class="alert-box success radius">
            <p class="alert">{{ Session::get('message') }}</p>
            <a href="#" class="close">&times;</a>
          </div>
      </div>
      @endif

       @yield('content')

      <div class="push"></div>

    </div>

    <div id="footer">
      <div class="row">
        <p>Learn More</p>
      </div>
    </div>
    
    {{ HTML::script('js/vendor/jquery.js'); }}
    {{ HTML::script('js/foundation.min.js'); }}
    {{ HTML::script('js/foundation/foundation.reveal.js'); }}
    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js'); }}
    <script>
      $(document).foundation();
    </script>
    {{ HTML::script('js/vendor/jquery.carouFredSel-6.0.4-packed.js'); }}
    <script type="text/javascript">
      $(function() {

        var $c = $('#carousel'),
          $w = $(window);

        $c.carouFredSel({
          align: false,
          items: 10,
          scroll: {
            items: 1,
            duration: 2000,
            timeoutDuration: 0,
            easing: 'linear',
            pauseOnHover: 'immediate'
          }
        });

        
        $w.bind('resize.example', function() {
          var nw = $w.width();
          if (nw < 990) {
            nw = 990;
          }

          $c.width(nw * 3);
          $c.parent().width(nw);

        }).trigger('resize.example');

      });
    </script>
  </body>
</html>
