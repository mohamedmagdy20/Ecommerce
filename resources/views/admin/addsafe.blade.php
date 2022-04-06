@extends('layouts.adminlayout')
@section('content')
<div class="container pt-5">
    <div class="product-contain m-auto">
        <div class="pb-5 fs-4 fw-bold text-black"><span class="text-danger">Add</span> Safe</div>
        <form action="{{url('admin/storesafe')}}" method="POST">
            @csrf
            <label for="name" class="pb-2">Enter Name of Safe</label>
            <input type="text" class="form-control mb-3"  id="name" name="name" placeholder=" ">
            @error("name")
            <div id="success" class="text-center alert alert-danger">
                <h6>{{$message}}</h6> 
            </div>
            @enderror
            <label for="name" class="pb-2">Enter Amount</label>
            <input type="text" class="form-control mb-3"  name="amount" placeholder="">
            @error("amount")
            <div id="success" class="text-center alert alert-danger">
                <h6>{{$message}}</h6> 
            </div>
            @enderror
              <button type="submit" class="btn btn-danger">Submit</button>
        </form>
    </div>
</div>

@endsection