@extends('layouts.adminlayout')
@section('content')
<div class="container pt-5">
    <div class="tab bg-light p-5 rounded-3 shadow-sm ">
        @if(Session::has('success'))
        <div id="success" class="text-center fs-4 alert alert-success">
            {{Session::get('success')}}
        </div>
      @endif
    <div class="form-contain m-auto">
        <div class="pt-3 pb-5 d-flex justify-content-between align-items-center">
            <div class=" fs-5 fw-bold text-black"><span class="text-danger">{{$shipmentName->shipment_items}}</span> Shipment</div>
            <div>
            <div  class ="fs-5 fw-bold text-black"> <span class="text-danger">Money:</span>${{$safemoney->amount}}</div>
            <div class="fs-5 fw-bold text-black"><span class="text-danger">Total: </span>${{$total}}</div> 
        </div>       
        </div>
        <div class="pb-4">
        <a href="#" id="shipment" class="btn mb-2 btn-danger">Submit Shipment</a>
        <a href="{{url('admin/addproduct_shipment')}}?shipment_id={{$shipment_id}}" class='btn mb-2 btn-secondary'>Add New Product</a>
        <a href="{{url("admin/showshipment/$shipment_id")}}" class="btn mb-2 btn-dark">View  Shipment</a>
    </div>
    <div class="mb-3 fs-5 fw-bold">Select products</div>
        <div class="tablehead text-center row justify-content-around align-items-center  pt-2 pb-2 bg-danger rounded-top  text-white fw-bold">
            <div class="col-lg-2">Name</div>
            <div class="col-lg-1">Category</div>
            <div class="col-lg-1">Supplier</div>
            <div class="col-lg-2">IMG</div>
            <div class="col-lg-1">Stock</div>
            <div class="col-lg-1">PriceIN</div>
            <div class="col-lg-1">PriceOut</div>
            <div class="col-lg-2">CreateAt</div>
            <div class="col-lg-1">Add</div>
            
        </div>
        @if (! $products->isEmpty())
            @foreach ($products as $prod )
            <div class="tablebody text-center  row justify-content-around align-items-center pt-2 pb-2 fw-bold shadow-sm">
                    <div class="col-lg-2">{{$prod->prodName}}</div>
                    <div class="col-lg-1" >{{$prod->catName}}</div>
                    <div class="col-lg-1" >{{$prod->supName}}</div>
                    <div class="col-lg-2"> <div class="m-auto prod-img"> <img  src="{{asset("uploads/$prod->img")}}" alt=""> </div></div>
                    <div class="col-lg-1" >{{$prod->stock}}</div>
                    <div class="col-lg-1" >{{$prod->pricein}}</div>
                    <div class="col-lg-1" >{{$prod->priceout}}</div>
                    <div class="col-lg-2" >{{$prod->created_at}}</div>
                    <div class="col-md-1"><a id="selectprod" href="{{url("admin/selectproduct/$prod->prodId")}}?shipment_id={{$shipment_id}}"><i class="fa fa-plus"></i></a></div>
               
                </div>
        @endforeach
        @else
        <div class="text-center fs-4 fw-bold text-black pt-3 ">Empty &#x1F615;</div>
        @endif
    </div>

</div>
<section id="fixedbox_submit" class="d-none">
    <div class="tab bg-light p-5 rounded-3 shadow-sm ">
        <div id="choose" class="select text-center bg-dark w-50 m-auto p-4 shadow-sm rounded-3">
          <div class="pb-3 fs-3 fw-bold text-white">Are you sure you of Submition ?</div>
          <div class="d-flex justify-content-around align-items-center">
            <a href="{{url('admin/approveshipment')}}?shipment_id={{$shipment_id}}" class="btn btn-danger">Approve</a>
            <a href="" id="cencle" class="btn btn-warning text-white">Cencel</a>
          </div>
          <a href="" id="close"> <i class="fas fa-times"></i></a>
        </div>
</section>
@endsection