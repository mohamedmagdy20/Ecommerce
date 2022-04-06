@extends('layouts.adminlayout')
@section('content')
<div class="container pt-5 pb-5">
    
    <div class="tab bg-light p-5 rounded-3 shadow-sm ">
      @if(Session::has('success'))
      <div id="success" class="text-center fs-4 alert alert-success">
          {{Session::get('success')}}
      </div>
    @endif
         <div class="fs-4 text-center fw-bold p-3">Categories</div>
         <div class="main">
           <form action="{{url('admin/search_category')}}" method="POST" >
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
        <a href="{{url('admin/addcategory')}}" class="btn btn-secondary text-white mb-3">Add Category</a>
        <div class="tablehead text-center d-flex justify-content-around align-items-center  pt-2 pb-2 bg-danger rounded-top  text-white fw-bold">
            <div>Name</div>
            <div>Create At</div>
            <div>Update</div>
        </div>
        @if (! $search->isEmpty())
            @foreach ($search as $cat )
            <div class="tablebody text-center  d-flex justify-content-around align-items-center pt-2 pb-2 fw-bold shadow-sm">
                    <div class="col-4">{{$cat->name}}</div>
                    <div class="col-4" >{{$cat->created_at}}</div>
                    <div class="col-4"><a href="{{url("admin/editcategory/$cat->id")}}"><i class="fa fa-pen-nib "></i></a></div>
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

