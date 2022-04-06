@extends('layouts.adminlayout')
@section('content')
<div class="container pt-5">
    <div class="product-contain m-auto">
        <div class="pb-5 fs-4 fw-bold text-black"><span class="text-danger">Add</span> Admin</div>
        <form action="{{url('admin/storeadmin')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name" class="pb-2">Enter Name</label>
            <input type="text" class="form-control mb-3"  id="name" name="name" placeholder=" ">
            @error("name")
        <div id="success" class="text-center alert alert-danger">
            <h6>{{$message}}</h6> 
        </div>
        @enderror
            <label for="name" class="pb-2">Enter Eamil</label>
            <input type="text" class="form-control mb-3"  id="email" name="email" placeholder=" ">
            @error("email")
        <div id="success" class="text-center alert alert-danger">
            <h6>{{$message}}</h6> 
        </div>
        @enderror
            <label for="name" class="pb-2">Enter Password</label>
            <input type="text" class="form-control mb-3"  id="name" name="password" placeholder=" ">
            @error("password")
        <div id="success" class="text-center alert alert-danger">
            <h6>{{$message}}</h6> 
        </div>
        @enderror
            <label for="name" class="pb-2">Enter Image</label>
            <input id="img" class="form-control mb-3" type="file" name="img">
            @error("img")
        <div id="success" class="text-center alert alert-danger">
            <h6>{{$message}}</h6> 
        </div>
        @enderror
           <button class="btn btn-danger mt-3 ">Submit</button>
        </form>
    </div>
</div>

@endsection