<!DOCTYPE html>
<html lang="en">
  <head>
    @include('nasabah.head')
  </head>

  <body>

    <!-- Fixed navbar -->
    @include('nasabah.navbar')

    <div class="container">

      @yield('nasabah.content')

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('resources/assets/inspinia/js/jquery-2.1.1.js') }}"></script>
    <script>window.jQuery || document.write('<script src="{{ asset("resources/assets/inspinia/js/vendor/jquery.min.js") }}"><\/script>')</script>
    <script src="{{ asset('resources/assets/inspinia/js/bootstrap.min.js') }}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('resources/assets/inspinia/js/ie10-viewport-bug-workaround.js') }}"></script>
  </body>
</html>
 