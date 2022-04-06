@extends('layouts.adminlayout')
@section('content')
<div class="container pt-5 pb-5">
    
    <div class="tab bg-light p-5 rounded-3 shadow-sm ">
      @if(Session::has('storesuccess'))
      <div id="success" class="text-center fs-4 alert alert-success">
          {{Session::get('storesuccess')}}
      </div>
    @endif
         <div class="fs-4 text-center fw-bold p-3">Shipments</div>
         <div class="main">
           <form action="{{url('admin/search_category')}}" method="POST" >
            @csrf
            <div class="input-group">
              
                <div class="input-group-append">
                </div>
              </form>
              </div>
        </div>
        @if ($shipstatue->statue != 'Approve')        
        <a href="{{url("admin/makeshipment?shipment_id=$shipId->id")}}" id="shipment" class="btn btn-secondary mb-3">Submit Shipment</a>
        @endif
        <div class="tablehead text-center row justify-content-around align-items-center  pt-2 pb-2 bg-danger rounded-top  text-white fw-bold">
            <div class="col-lg-2">Product Name</div>
            <div class="col-lg-2">Stock</div>
            <div class="col-lg-2">Price per one</div>
            <div class="col-lg-2">Total</div>
            <div class="col-lg-3">Img</div>
            <div class="col-lg-1"></div>
        </div>
        @if (! $ships->isEmpty())
            @foreach ($ships as $ship )
            <div class="tablebody text-center  row justify-content-around align-items-center pt-2 pb-2 fw-bold shadow-sm">
                    <div class="col-lg-2">{{$ship->prodName}}</div>
                    <div class="col-lg-2">{{$ship->stock}}</div>
                    <div class="col-lg-2">{{$ship->price}}</div>
                    <div class="col-lg-2">{{$ship->total}}</div>
                    <div class="col-lg-3"> <div class="m-auto prod-img"> <img  src="{{asset("uploads/$ship->img")}}" alt=""> </div></div>
                    @if ($ship->statue == 'Pennding')
                    <div class="col-lg-1"><a href="{{url("admin/deleteshipment_item/$ship->itemId")}}"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></div>
                    @endif
            </div>
        @endforeach
        @else
        <div class="text-center fs-4 fw-bold text-black pt-3 ">Empty &#x1F615;</div>
        @endif
       
    </div>
</div>
{{-- <section id="fixedbox_submit" class="d-none">
    <div class="tab bg-light p-5 rounded-3 shadow-sm ">
        <div id="choose" class="select text-center bg-dark w-50 m-auto p-4 shadow-sm rounded-3">
          <div class="pb-3 fs-3 fw-bold text-white">Are you sure you of Submition ?</div>
          <div class="d-flex justify-content-around align-items-center">
            <a href="{{url('admin/approveshipment')}}?shipment_id={{$shipment_id}}" class="btn btn-danger">Approve</a>
            <a href="" id="cencle" class="btn btn-warning text-white">Cencel</a>
          </div>
          <a href="" id="close"> <i class="fas fa-times"></i></a>
        </div>
</section> --}}
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

