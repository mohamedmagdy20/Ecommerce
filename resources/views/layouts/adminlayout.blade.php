<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('style/bootstrap-5.1.3-dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('style/admin-style.css')}}">
    <script src="{{asset('js/font.js')}}"></script>
    <title>Document</title>
</head>
<body>
    @include('inc.sidebar')
    @yield('content')
    
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>   
    <script src="{{asset('js/script.js')}}"></script>   
    <script src="{{asset('style/bootstrap-5.1.3-dist/js/bootstrap.bundle.js')}}" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>