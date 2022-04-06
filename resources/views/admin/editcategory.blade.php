@extends('layouts.adminlayout')
@section('content')
<div class="container pt-5">
    <div class="form-contain m-auto">
        <div class="pb-5 fs-4 fw-bold text-black"><span class="text-danger">Edit</span> Category</div>
        <form action="{{url('admin/updatecategory')}}" method="POST">
            @csrf
            <input type="text" class="form-control"  value="{{$data->name}}" id="fullName" name="name" placeholder=" ">
            <input type="hidden" name="id" value="{{$data->id}}">
            <label for="fullName">Enter Name of category</label>
           <button class="btn btn-danger mt-3 m-auto">Submit</button>
        </form>
        @error("name")
        <div id="success" class="text-center alert alert-danger">
            <h6>{{$message}}</h6> 
        </div>
        @enderror
    </div>
</div>

@endsection