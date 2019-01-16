<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="access-token" content="{{ auth()->user()->token }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app"></div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
    var timeout
    function refresh(){
      clearTimeout(timeout)
      timeout = setTimeout(() => {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            location.reload()
          }
        };
        xhttp.open("POST", "/logout", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("_token={{csrf_token() }}");
      }, {{ (config('session.lifetime')-10) * 60 * 1000 }})
    }
    refresh()
    document.addEventListener('click', refresh)
    </script>
</body>
</html>
