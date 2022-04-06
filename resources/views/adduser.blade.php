<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('style/bootstrap-5.1.3-dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('style/user-style.css')}}">
    <title>Document</title>
</head>
<body>
<div class="container pt-5">
    <div class="product-contain bg-light m-auto">
        
    <form action="{{url('storeusers')}}" method="POST" enctype="multipart/form-data" class="border-3 p-4 rounded-3">
        <h2 class="text-danger">SignUp</h2>
        @csrf
        <label for="">Name</label>
        <input class="form-control mb-3" type="text" name="name" placeholder="Name">
        @error("name")
        <div class="text-center alert alert-danger">
            <h6>{{$message}}</h6> 
        </div>
       @enderror
       <label for="">Email</label>
        <input class="form-control mb-3" type="text" name="email" placeholder="Email">
        @error("email")
        <div class="text-center alert alert-danger">
            <h6>{{$message}}</h6> 
        </div>
       @enderror
       <label for="">Password</label>
        <input class="form-control mb-3" type="text" name="pass" placeholder="password">
        @error("pass")
        <div class="text-center alert alert-danger">
            <h6>{{$message}}</h6> 
        </div>
       @enderror
       <label for="">Image</label>
        <input class="form-control mb-3" type="file" name="images" >
        <input class="btn btn-danger" type="submit" value="Submit">
    </form>
    </div>
</div>
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>   
    <script src="{{asset('js/script.js')}}"></script>   
    <script src="{{asset('style/bootstrap-5.1.3-dist/js/bootstrap.bundle.js')}}" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>