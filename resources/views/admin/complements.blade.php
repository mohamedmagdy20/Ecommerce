@extends('layouts.adminlayout')
@section('content')
<div class="container pt-5 pb-5">
    
    <div class="tab bg-light p-5 rounded-3 shadow-sm ">
      @if(Session::has('success'))
      <div id="success" class="text-center fs-4 alert alert-success">
          {{Session::get('success')}}
      </div>
    @endif
         <div class="fs-4 text-center fw-bold p-3">Complements</div>
         <div class="main pb-3">
           <form action="{{url('admin/search_category')}}" method="POST" >
            @csrf
            <div class="input-group">
                {{-- input< type="text" class="form-control" name="search" id="search" placeholder="Search"> --}}
              
                <div class="input-group-append">
                  {{-- <button class="btn btn-secondary" type="submit">
                    <i class="fa fa-search"></i>
                  </button> --}}
                </div>
              </form>
              </div>
        </div>
        <div class="tablehead text-center d-flex justify-content-around align-items-center  pt-2 pb-2 bg-danger rounded-top  text-white fw-bold">
            <div class="col-lg-2">Name</div>
            <div class="col-lg-2">Email</div>
            <div class="col-lg-2">Create At</div>
            <div class="col-lg-6">Messagezx</div>  
        </div>
        @if (! $comps->isEmpty())
            @foreach ($comps as $cat )
            <div class="tablebody text-center  d-flex justify-content-around align-items-center pt-2 pb-2 fw-bold shadow-sm">
                    <div class="col-2">{{$cat->name}}</div>
                    <div class="col-2">{{$cat->email}}</div>
                    <div class="col-2" >{{$cat->created_at}}</div>
                    <div class="col-6">{{$cat->message}}</div>
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

