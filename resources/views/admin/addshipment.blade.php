@extends('layouts.adminlayout')
@section('content')
<div class="container pt-5">
    <div class="product-contain m-auto">
        <div class="pb-5 fs-4 fw-bold text-black"><span class="text-danger">Add</span> Shipment</div>
        <form action="{{url('admin/storeshipment')}}" method="POST">
            @csrf
            <label for="name" class="pb-2">Enter Name of Shipment</label>
            <input type="text" class="form-control mb-3"  id="name" name="name" placeholder=" ">
            @error("name")
            <div id="success" class="text-center alert alert-danger">
                <h6>{{$message}}</h6> 
            </div>
            @enderror
            <label for="name" class="pb-2">Enter Safes</label>
            <select id="input" name="safes" class="form-select mb-3" aria-label="Default select example">
                @foreach ($safes as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>    
                @endforeach     
              </select>
              @error("safes")
              <div id="success" class="text-center alert alert-danger">
                  <h6>{{$message}}</h6> 
              </div>
              @enderror
              <label for="name" class="pb-2">Enter Supplier</label>
              <select id="input" name="supplier" class="form-select mb-3" aria-label="Default select example">
                @foreach ($suppliers as $sup)
                    <option value="{{$sup->id}}">{{$sup->name}}</option>    
                @endforeach     
              </select>
              @error("supplier")
              <div id="success" class="text-center alert alert-danger">
                  <h6>{{$message}}</h6> 
              </div>
              @enderror
              <button type="submit" class="btn btn-danger">Next</button>
        </form>
    </div>
</div>

@endsection