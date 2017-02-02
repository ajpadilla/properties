<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Properties</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  
    {!! Html::style('css/all.min.css') !!}
    @stack('vue-styles')
    @stack('styles')
</head>
    <body class="skin-blue sidebar-mini wysihtml5-supported">
        <div class="wrapper">
            @include('layouts.header')
        </div>

        {!! Html::script('js/all.min.js') !!}
        @yield('scripts')
        @stack('vue-scripts')
    </body>
</html>