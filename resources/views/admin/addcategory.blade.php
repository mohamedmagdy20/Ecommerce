@extends('layouts.adminlayout')
@section('content')
<div class="container pt-5">
    <div class="product-contain m-auto">
        <div class="pb-5 fs-4 fw-bold text-black"><span class="text-danger">Add</span> Category</div>
        <form action="{{url('admin/storecategory')}}" method="POST">
            @csrf
            <input type="text" class="form-control" id="fullName" name="name" placeholder="Enter Category">
           <button class="btn btn-danger mt-3 ">Submit</button>
        </form>
        @error("name")
        <div id="success" class="text-center alert alert-danger">
            <h6>{{$message}}</h6> 
        </div>
        @enderror
    </div>
</div>

@endsection