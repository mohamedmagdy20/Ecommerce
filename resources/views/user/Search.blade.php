@extends("layouts.user-layout")
  @section('user-content')
  <section id="products" class="">
    <div class="container pt-5 pb-5">
    <div class="row">
      <div class="col-lg-3">
        <div class="prod-category text-left">
          <ul>
            <p>Categories</p>
            @foreach ($cats as $cat)
            <li><a class="" href="{{url("user/category/$cat->catId")}}">{{$cat->catName}}</a></li>    
            @endforeach
          </ul>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="items position-relative">
          <div class="row">
            @foreach ($search as $prod)
            <div class="col-md-4">
              <a href="{{url("user/product/$prod->id")}}" class="text-decoration-none">
              <div class="item text-center shadow p-3 mb-5 bg-white rounded">
                <div class="item-img ">
                  <img src="{{url("uploads/$prod->prodImg")}}" alt="">
                </div>
                <div class="item-body">
                  <span >{{$prod->catName}}</span>
                  <h3 class="text-dark fs-5 pb-2 pt-3">{{$prod->prodName}}</h3>
                  <h5 class="text-dark">${{$prod->priceOut}}</h5>
                </div>
              </div>
            </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    
    </div>
  </div>
    
  </section>
  @endsection