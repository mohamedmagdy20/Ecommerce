@extends('layouts.adminlayout')
@section('content')
<div class="container pt-5">
    <div class="product-contain m-auto">
        <div class="pb-5 fs-4 fw-bold text-black"><span class="text-danger">Add</span> Safe</div>
        <form action="{{url('admin/storecio')}}" method="POST">
            @csrf
            <label for="name" class="pb-2">Enter name of Bank</label>
              <select id="input" name="safe" class="form-select mb-3" aria-label="Default select example">
                @foreach ($safes as $safe)
                    <option value="{{$safe->id}}">{{$safe->name}}</option>    
                @endforeach     
              </select>
            <label for="name" class="pb-2">Enter Amount you Need</label>
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