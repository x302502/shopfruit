<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FruitDelicious</title>
  <base href="{{asset('')}}">
  <link rel="icon" href="img/icon.png">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="css/mycss.css">
  <link rel="stylesheet" href="css/layoutlogin.css">
  <link rel="stylesheet" href="css/space.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/activityIndicator.css">

</head>
<body>
  @include('layouts.header')
  <div class="space-width-color"></div>
  <div id="loading" class="loading">
      Loading&#8230;     
    </div>
  @yield('body')

  <div class="space30"></div>
  @include('layouts.footer')


  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/myjs.js"></script>
</body>
</html>
