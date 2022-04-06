@extends('layouts.adminlayout')
@section('content')
<div class="container pt-5 pb-5">
    
    <div class="tab bg-light p-5 rounded-3 shadow-sm ">
      @if(Session::has('success'))
      <div id="success" class="text-center fs-4 alert alert-success">
          {{Session::get('success')}}
      </div>
    @endif
         <div class="fs-4 text-center fw-bold p-3">Products</div>
         <div class="main">
           <form action="{{url('admin/searchproduct')}}" method="POST" >
            @csrf
            <div class="input-group">
                <input type="text" class="form-control" name="search" id="search" placeholder="Search">
              
                <div class="input-group-append">
                  <button class="btn btn-secondary" type="submit">
                    <i class="fa fa-search"></i>
                  </button>
                </div>
              </form>
              </div>
        </div>
        <a href="{{url('admin/addproduct')}}" class="btn btn-secondary text-white mb-3">Add Product</a>
        <a href="{{url('admin/shortageproduct')}}" class="btn btn-danger mb-3">Shortage products</a>
        <div class="tablehead text-center row justify-content-around align-items-center  pt-2 pb-2 bg-danger rounded-top  text-white fw-bold">
            <div class="col-lg-1">Name</div>
            <div class="col-lg-1">Category</div>
            <div class="col-lg-1">Supplier</div>
            <div class="col-lg-2">IMG</div>
            <div class="col-lg-1">Stock</div>
            <div class="col-lg-1">PriceIN</div>
            <div class="col-lg-1">PriceOut</div>
            <div class="col-lg-2">CreateAt</div>
            <div class="col-lg-1">Update</div>
            <div class="col-lg-1">Delete</div>
            
        </div>
        @if (! $search->isEmpty())
            @foreach ($search as $prod )

            @if ($prod->stock <=10)
            <div class="tablebody text-center text-danger  row justify-content-around align-items-center pt-2 pb-2 fw-bold shadow-sm">
              <div class="col-lg-1">{{$prod->prodName}}</div>
              <div class="col-lg-1" >{{$prod->catName}}</div>
              <div class="col-lg-1" >{{$prod->supName}}</div>
              <div class="col-lg-2"> <div class="m-auto prod-img"> <img  src="{{asset("uploads/$prod->img")}}" alt=""> </div></div>
              <div class="col-lg-1" >{{$prod->stock}}</div>
              <div class="col-lg-1" >{{$prod->priceIn}}</div>
              <div class="col-lg-1" >{{$prod->priceOut}}</div>
              <div class="col-lg-2" >{{$prod->created_at}}</div>
              <div class="col-lg-1"><a href="{{url("admin/editproduct/$prod->prodId")}}"><i class="fa fa-pen-nib "></i></a></div>
              <div class="col-md-1"><a href="{{url("admin/deleteproduct/$prod->prodId")}}"><i class="fa fa-trash text-danger"></i></a></div>
          </div>
            @else
            <div class="tablebody text-center  row justify-content-around align-items-center pt-2 pb-2 fw-bold shadow-sm">
                    <div class="col-lg-1">{{$prod->prodName}}</div>
                    <div class="col-lg-1" >{{$prod->catName}}</div>
                    <div class="col-lg-1" >{{$prod->supName}}</div>
                    <div class="col-lg-2"> <div class="m-auto prod-img"> <img  src="{{asset("uploads/$prod->img")}}" alt=""> </div></div>
                    <div class="col-lg-1" >{{$prod->stock}}</div>
                    <div class="col-lg-1" >{{$prod->priceIn}}</div>
                    <div class="col-lg-1" >{{$prod->priceOut}}</div>
                    <div class="col-lg-2" >{{$prod->created_at}}</div>
                    <div class="col-lg-1"><a href="{{url("admin/editproduct/$prod->prodId")}}"><i class="fa fa-pen-nib "></i></a></div>
                    <div class="col-md-1"><a href="{{url("admin/deleteproduct/$prod->prodId")}}"><i class="fa fa-trash text-danger"></i></a></div>
                </div>
             @endif
        @endforeach
        @else
        <div class="text-center fs-4 fw-bold text-black pt-3 ">Empty &#x1F615;</div>
        @endif
       
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript">
  var route = "{{ url('admin/search_category') }}";
  $('#search').typeahead({
      source: function (query, process) {
          return $.get(route, {
              query: query
          }, function ($cats->name) {
              return process($cats->name);
          });
      }
  });
</script>
@endsection

