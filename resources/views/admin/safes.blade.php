@extends('layouts.adminlayout')
@section('content')
<div class="container pt-5 pb-5">
    
    <div class="tab bg-light p-5 rounded-3 shadow-sm ">
      @if(Session::has('success'))
      <div id="success" class="text-center fs-4 alert alert-success">
          {{Session::get('success')}}
      </div>
    @endif
    <div class="text-left fs-4 fw-bold text-success"><span class="text-dark">Total: </span>${{number_format($total,2)}}</div>
         <div class="fs-4 text-center fw-bold p-3">Safes</div>
         
         <div class="main pb-3">
           <form action="{{url('admin/searchsafe')}}" method="POST" >
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
        <a href="{{url('admin/addsafe')}}" class=" mb-3 btn btn-dark">Add Safe</a>
        <a href="{{url('admin/makecio')}}" class=" mb-3 btn btn-secondary">Make Cio</a>
        <div class="tablehead text-center row justify-content-around align-items-center  pt-2 pb-2 bg-danger rounded-top  text-white fw-bold">
            <div class="col-lg-3">Bank Name</div>
            <div class="col-lg-3">Amount</div>
            <div class="col-lg-3">Create At</div>
            <div class="col-lg-3">Updated at</div>  
        </div>
        @if (! $safes->isEmpty())
            @foreach ($safes as $cat )
            <div class="tablebody text-center  row justify-content-around align-items-center pt-2 pb-2 fw-bold shadow-sm">
                    <div class="col-lg-3">{{$cat->name}}</div>
                    <div class="col-lg-3 text-success">${{$cat->amount}}</div>
                    <div class="col-lg-3" >{{$cat->created_at}}</div>
                    <div class="col-lg-3">{{$cat->updated_at}}</div>
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

