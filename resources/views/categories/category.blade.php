<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home</title>
    <link rel="icon" href="{{ asset("/img/core-img/favicon.ico") }}">
    <link rel="stylesheet" href="{{ asset("/css/core-style.css") }}">
    <link href="{{ asset("css/responsive.css") }}" rel="stylesheet">
</head>
<body>
<h2>Categories {{ $category->name }}</h2>
<script src="{{ asset('/js/jquery/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('/js/popper.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/plugins.js') }}"></script>
<script src="{{ asset('/js/active.js') }}"></script>
</body>
</html>
