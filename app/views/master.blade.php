<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title>阿爾法領地管理系統</title>

  @section('head_css')
    <!-- <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700|Open+Sans:300italic,400,300,700' rel='stylesheet' type='text/css'> -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/semantic/packaged/css/semantic.min.css')}}">
  @show
</head>
<body style="width: 80%; margin: auto; background: #FCFCFC url(../images/bg.jpg) repeat;">
  @yield('content')

  @section('footer_scripts')
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/semantic/packaged/javascript/semantic.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.tablesort.min.js')}}"></script>
  @show
</body>
</html>
