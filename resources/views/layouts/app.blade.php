
<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>PhotoShow</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.1/css/foundation.min.css">
    <style>
     @import url('https://fonts.googleapis.com/css?family=Lato');
    *{
    font-family: 'Lato', sans-serif !important;
    }
    </style>
  </head>
  <body>
    <!-- content starts here -->
    @include('inc.topbar')
    <div class="grid-container">
        @yield('content')
    </div>
    <!-- content ends here -->
    <!--JavaScript at end of body for optimized loading-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.1/js/foundation.min.js"></script>
    <script>$(document).foundation();</script>
  </body>
</html>