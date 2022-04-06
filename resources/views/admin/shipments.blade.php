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
           <form action="{{url('admin/searchshipment')}}" method="POST" >
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
        <a href="{{url('admin/addshipment')}}" class="btn btn-secondary text-white mb-3">Add Shipment</a>  
        
        <div class="tablehead text-center row justify-content-around align-items-center  pt-2 pb-2 bg-danger rounded-top  text-white fw-bold">
            <div class="col-lg-2">Shipment Name</div>
            <div class="col-lg-2">Order By</div>
            <div class="col-lg-2">Supplires Name</div>
            <div class="col-lg-2">Total</div>
            <div class="col-lg-2">Payed from</div>
            <div class="col-lg-1">Statue</div>
            <div class="col-lg-1">view</div>
        </div>
        @if (! $ships->isEmpty())
            @foreach ($ships as $ship )
            <div class="tablebody text-center  row justify-content-around align-items-center pt-2 pb-2 fw-bold shadow-sm">
                    <div class="col-lg-2">{{$ship->shipName}}</div>
                    <div class="col-lg-2">{{$ship->adminName}}</div>
                    <div class="col-lg-2">{{$ship->supName}}</div>
                    <div class="col-lg-2">${{$ship->total}}</div>
                    <div class="col-lg-2">{{$ship->safeName}}</div>
                    @if ($ship->statue == 'Approve')
                    <div class="col-lg-1 text-success" >{{$ship->statue}}</div>
                    @else
                    <div class="col-lg-1">{{$ship->statue}}</div>
                    @endif
                    @if ($ship->statue != 'Approve')
                    <div class="col-lg-1">
                      <a href="{{url("admin/showshipment/$ship->shipId")}}"><i class="fa fa-eye "></i></a>
                      <a href="{{url("admin/deleteshipment/$ship->shipId")}}"><i class="fa fa-trash text-danger "></i></a>
                      <a href="{{url("admin/editshipment/$ship->shipId")}}"><i class="fa fa-pen-nib"></i></a>
                   
                    </div>
                    @else
                    <div class="col-lg-1"><a href="{{url("admin/showshipment/$ship->shipId")}}"><i class="fa fa-eye "></i></a></div>
                    @endif
                  </div>
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

