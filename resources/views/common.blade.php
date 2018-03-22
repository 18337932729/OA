
<!DOCTYPE html>
<html>

<head>
    <title>{{getAppName()}}--@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <!-- CSS Libs -->
    <link rel="stylesheet" type="text/css" href="{{asset('/lib/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/lib/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/lib/css/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/lib/css/bootstrap-switch.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/lib/css/checkbox3.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/lib/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/lib/css/dataTables.bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/lib/css/select2.min.css')}}">
    <!-- CSS App -->
    <link rel="stylesheet" type="text/css" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/themes/flat-blue.css')}}">
</head>

@section('body')
@show
    <!-- Javascript Libs -->
    <script type="text/javascript" src="{{asset('/lib/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/lib/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/lib/js/Chart.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/lib/js/bootstrap-switch.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/lib/js/jquery.matchHeight-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/lib/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/lib/js/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/lib/js/select2.full.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/lib/js/ace/ace.js')}}"></script>
    <script type="text/javascript" src="{{asset('/lib/js/ace/mode-html.js')}}"></script>
    <script type="text/javascript" src="{{asset('/lib/js/ace/theme-github.js')}}"></script>
    <!-- /.container -->
    <script type="text/javascript" src="{{asset('/js/app.js')}}"></script>
    @section('script')
    @show
</body>
</html>
