@extends('layouts.adminlayout')
@section('content')
<div class="container pt-5 pb-5">
    
    <div class="tab bg-light p-5 rounded-3 shadow-sm ">
      @if(Session::has('success'))
      <div id="success" class="text-center fs-4 alert alert-success">
          {{Session::get('success')}}
      </div>
    @endif
         <div class="fs-4 text-center fw-bold p-3">Users</div>
         
         <div class="main pb-3">
           <form action="{{url('admin/searchuser')}}" method="POST" >
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
        <div class="tablehead text-center row justify-content-around align-items-center  pt-2 pb-2 bg-danger rounded-top  text-white fw-bold">
            <div class="col-lg-2">User Name</div>
            <div class="col-lg-2">Eamil</div>
            <div class="col-lg-2">Img</div>
            <div class="col-lg-3">Created at</div>  
        </div>
        @if (! $users->isEmpty())
            @foreach ($users as $user )
            <div class="tablebody text-center  row justify-content-around align-items-center pt-2 pb-2 fw-bold shadow-sm">
                    <div class="col-lg-2">{{$user->name}}</div>
                    <div class="col-lg-2 text-success">{{$user->email}}</div>
                    <div class="col-lg-2"> <div class="m-auto prod-img"> <img  src="{{asset("images-users/$user->img")}}" alt=""> </div></div>
                    <div class="col-lg-3">{{$user->created_at}}</div>
                    
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

