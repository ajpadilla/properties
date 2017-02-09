<!DOCTYPE html>
<html>
  <head>
    <title>Angular QuickStart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="angular/styles.css">

    <!-- Polyfill(s) for older browsers -->
    <script src="{{ asset('angular/node_modules/core-js/client/shim.min.js') }}"></script>

    <script src="{{ asset('angular/node_modules/zone.js/dist/zone.js') }}"></script>
    <script src="{{ asset('angular/node_modules/systemjs/dist/system.src.js') }}"></script>

    <script src="{{ asset('angular/systemjs.config.js') }}"></script>

    <script>
      System.import('app').catch(function(err){ console.error(err); });
    </script>
  </head>

  <body>
    <my-app>Loading AppComponent content here ...</my-app>
  </body>
</html>
