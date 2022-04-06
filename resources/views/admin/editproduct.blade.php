@extends('layouts.adminlayout')
@section('content')
<div class="container pt-5">
    <div class="product-contain m-auto">
        <div class="pb-5 fs-4 fw-bold text-black"><span class="text-danger">Update</span> Product</div>
        <form action="{{url('admin/updateproduct')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name" class="pb-2">Enter Name of product</label>
            <input type="text" value="{{$prod->prodName}}" class="form-control mb-3"  id="name" name="name" placeholder=" ">

            <label for="name" class="pb-2">Enter Category</label>
            <select id="input" name="category" class="form-select mb-3" aria-label="Default select example">
                <option>{{$prod->catName}}</option>    
                @foreach ($cats as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>    
                @endforeach     
              </select>
              <label for="name" class="pb-2">Enter Supplier</label>
              <select id="input" name="supplier" class="form-select mb-3" aria-label="Default select example">
                <option>{{$prod->supName}}</option>    
                @foreach ($sups as $sup)
                    <option value="{{$sup->id}}">{{$sup->name}}</option>    
                @endforeach     
              </select>
              <label for="stock" class="pb-2">Enter Number of Pieces</label>
              <input type="text" class="form-control mb-3" value="{{$prod->stock}}"  id="stock" name="stock" placeholder=" ">
  
              <label for="name" class="pb-2">Enter Image</label>
              <input id="img" class="form-control mb-3" type="file" name="images[]" multiple>

              <label for="name" class="pb-2">Enter PriceIn</label>
              <input id="priceIn" class="form-control mb-3" value="{{$prod->priceIn}}" type="text" name="priceIn" >

              <label for="name" class="pb-2">Enter PriceOut</label>
              <input id="priceOut" class="form-control mb-3" value="{{$prod->priceOut}}" type="text" name="priceOut" >

              
              <label for="name" class="pb-2">Enter Decription</label>
              <textarea name="desc" class="form-control" id="" cols="30" rows="10">{{$prod->description}}</textarea>
           <button class="btn btn-danger mt-3 ">Submit</button>
        </form>
    </div>
</div>

@endsection