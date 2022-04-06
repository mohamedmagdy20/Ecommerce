
  @extends("layouts.user-layout")
  @section('user-content')
  @if(Session::has('success'))
  <div id="success" class="text-center fs-4 alert alert-success">
      {{Session::get('success')}}
  </div>
@endif
  <div class="category-content row m-auto container pt-5 pb-5">
    <h2><span>Our</span> Collections</h2>
    @foreach($cats as $cat)
      <div class="col-lg-4 col-md-6">
        <div class="content">
          <a class="text-decoration-none" href="{{url("user/category/$cat->catId")}}">
          <div class="content-color"></div>
          <div class="content-img text-center">
            <img class="img-fluid" src="{{asset("uploads/$cat->catImg")}}" alt="">
          </div>
          <div class="content-body">
            <h3>{{$cat->catName}}<br>Collection</h3>
            <a href="{{url("user/category/$cat->catId")}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </a>
      </div>
    </div>
    @endforeach
  </div>

  <div class="shop-now mt-5">
    <div class="shop-body">
        <p class="shop-head">HOT DEAL THIS WEEK</p>
        <p>NEW COLLECTION UP TO 50% OFF</p>
        <a class="btn btn-danger" href="{{url("user/showproducts")}}">Shop Now</a>
    </div>
  </div>
  <div id="new" class="swiper mySwiper">
    <h2 class="text-center pt-5"><span class="text-danger">New </span>Products</h2>
    <div class="swiper-wrapper">
      @foreach ( $newprods as $prod )
      <div class="swiper-slide">
       <a class="text-decoration-none" href="{{url("user/product/$prod->id")}}">
        <div class="product text-center">
          <div class="prod-img">
            <img src="{{url("uploads/$prod->img")}}" alt="" />
          </div>
          <div class="prod-body pt-4">
            <h3 class="text-dark">{{$prod->name}}</h3>
            <h5 class="text-dark">Price: <span class="text-danger">${{$prod->priceIn}}</span></h5>
            <a href="{{url("user/product/$prod->id")}}" class="btn btn-danger">View</a>
          </div>
        </div>
      </a>
      </div>
      @endforeach
    </div>
    <div class="swiper-pagination"></div>
  </div> 
  
  <div id="note" class="comp p-5">
    <div class="container">
    <div class="fs-4 fw-bold pb-3"> <span class="text-danger">Send</span> a Note</div>
    <div>
      <form action="{{url('user/storecomplements')}}" method="POST">
        @csrf
        <textarea name="com" class="form-control" id="" cols="30" rows="10"></textarea>
        <button type="submit" class="btn btn-danger mt-2">Submit</button>
      </form>
    </div>
  </div>
  </div>
  <script src="{{asset('js/swipper.js')}}"></script>
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 4,
      spaceBetween: 30,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      freeMode: true,
      // loop: true,
      breakpoints: {
        // when window width is <= 499px
        200: {
            slidesPerView: 1,
            spaceBetweenSlides: 30
        },
        650: {
            slidesPerView: 2,
            spaceBetweenSlides: 30
        },
        // when window width is <= 999px
        800: {
            slidesPerView: 3,
            spaceBetweenSlides: 40
        },
        1023: {
            slidesPerView: 4,
            spaceBetweenSlides: 40
        }
      }    
    });
  </script>
  @endsection
</body>
</html>
