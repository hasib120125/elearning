<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page-title') | Robi e-Training</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="{{ asset('vendor/adminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="{{ asset('vendor/adminLTE/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('fonts/roboto.css')}}" rel="stylesheet" type="text/css" />

    <!-- Ionicons -->
    <link href="{{ asset('vendor/adminLTE/bower_components/Ionicons/css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendor/adminLTE/bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("vendor/adminLTE/dist/css/AdminLTE.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("vendor/adminLTE/dist/css/skins/skin-robi.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("vendor//css/materialize.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("vendor/bootstrap-fileinput/css/fileinput.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("vendor/DataTables/datatables.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("vendor/daterange-picker/daterangepicker.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("css/dashboard.css") }}" rel="stylesheet" type="text/css" />

    @stack('styles')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-robi sidebar-mini">
<div class="wrapper">

    <!-- Header -->
    @include('layouts._dashboard.header')

    <!-- Sidebar -->
    @include('layouts._dashboard.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    @include('layouts._dashboard.footer')

</div><!-- ./wrapper -->


<script src="{{asset("vendor/adminLTE/bower_components/jquery/dist/jquery.min.js") }}"></script>
<script src="{{asset("vendor/adminLTE/bower_components/jquery-ui/jquery-ui.min.js") }}"></script>
<script src="{{asset("vendor/adminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
<script src="{{asset("vendor/adminLTE/bower_components/select2/dist/js/select2.min.js") }}"></script>
<script src="{{ asset('vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset("vendor/adminLTE/dist/js/adminlte.min.js") }}"></script>
<script src="{{asset("vendor/ckeditor/ckeditor.js") }}"></script>
<script src="{{asset("vendor/js/moment.js") }}"></script>
<script src="{{asset("vendor/Chart.min.js") }}"></script>
<script src="{{asset("vendor/js/jquery.LoadingBox.js")}}"></script>
<script src="{{asset("vendor/DataTables/datatables.min.js")}}"></script>
<script src="{{asset("vendor/bootstrap-fileinput/js/fileinput.min.js")}}"></script>
<script src="{{asset("vendor/daterange-picker/daterangepicker.js")}}"></script>
<script src="{{asset("js/dashboard.js") }}"></script>
<script src="{{asset("js/stream.js") }}"></script>
<script src="{{asset("js/shaka.js") }}"></script>
<script>
var lb;
function ajaxLoadingStart() {
  lb = new $.LoadingBox({
    // if the element doesn't exist, it will create a one new with the predefined html structure and css
    mainElementID: 'loading-box',

    // animation speed
    fadeInSpeed: 'normal',
    fadeOutSpeed: 'normal',

    // opacity
    opacity: 0.3,

    // background color
    backgroundColor: "#000",

    // width / height of the loading GIF
    loadingImageWitdth: "60px",
    loadingImageHeigth: "60px",

    // path to the loading gif
    loadingImageSrc: "{{ asset('img/ajax-loading.gif')}}"
  });
}
function ajaxLoadingStop(){
  lb.close();
}
</script>
<script>
var timeout
function refresh(){
  clearTimeout(timeout)
  timeout = setTimeout(() => {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4) {
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
@stack('scripts')
</bdoy>
</html>
