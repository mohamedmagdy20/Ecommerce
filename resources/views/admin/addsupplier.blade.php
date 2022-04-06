@extends('layouts.adminlayout')
@section('content')
<div class="container pt-5">
    <div class="product-contain m-auto">
        <div class="pb-5 fs-4 fw-bold text-black"><span class="text-danger">Add</span> Supplier</div>
        <form action="{{url('admin/storesupplier')}}" method="POST">
            @csrf
            <label  class="text-danger fw-bold pb-3">Enter Name Supplier</label>
            <input type="text" class="form-control" id="fullName" name="name" placeholder=" ">
            <button class="btn btn-danger mt-3">Submit</button>
        </form>
        @error("name")
        <div id="success" class="text-center alert alert-danger">
            <h6>{{$message}}</h6> 
        </div>
        @enderror
    </div>
</div>

@endsection