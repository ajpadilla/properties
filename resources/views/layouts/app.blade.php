<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} title</title>

    <!-- Styles -->
    {{--<link href="/css/app.css" rel="stylesheet">--}}
    {!! Html::style('css/all.min.css') !!}
    {!! Html::style('css/icheck/skins/all.css') !!}
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="hold-transition login-page">
    
    @yield('content')

    <!-- Scripts -->
    {{--<script src="/js/app.js"></script>--}}
    {!! Html::script('js/jquery-3.1.1.min.js') !!}
    {!! Html::script('js/icheck.min.js') !!}
    {!! Html::script('js/all.min.js') !!}
    <script>
      $(function () {
        $('.iCheck').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
</body>
</html>
