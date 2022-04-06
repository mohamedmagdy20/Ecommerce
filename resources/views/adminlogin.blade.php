<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('style/bootstrap-5.1.3-dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset("style/admin-style.css")}}">
    <title>Document</title>
</head>
<body>
    <div class="container pt-5">
        <div class="product-contain m-auto">
            <div class="tab  p-5 rounded-3 shadow-sm ">
                @if(Session::has('success'))
                <div id="success" class="text-center fs-4 alert alert-danger">
                    {{Session::get('success')}}
                </div>
              @endif
            <div class="pb-3 fs-4 fw-bold text-black text-center"><span class="text-danger">Admin </span>Login</div>
        <form action="{{url('loginrequest')}}" method="POST">
            @csrf
            <input type="text" name="email" class=" mb-3 form-control" placeholder="email">
            <input type="password" name="password" class="mb-3 form-control" placeholder="password">
            <input type="submit" value="Login" class="btn btn-danger">
        </form>
        </div>
    </div>
    
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>   
<script src="{{asset('js/script.js')}}"></script>   
<script src="{{asset('style/bootstrap-5.1.3-dist/js/bootstrap.bundle.js')}}" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>

