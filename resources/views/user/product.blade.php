@extends("layouts.user-layout")
@section('user-content')

<section class="selected-product pt-5 m-auto">
  <div class="container ">
    <div class="row justify-content-center">
        <div class="col-lg-6 ">
          <div class="img-contain bg-white p-5 shadow mb-5 rounded-3">
            <div class="swiper PSwiper pb-5">
              <div class="swiper-wrapper">
                @foreach ( $imgs as $img )
                  <div class="swiper-slide">
                      <img src="{{url("uploads/$img->img")}}" alt="">
                  </div>
                @endforeach  
              </div>
              <div class="swiper-button-prev"></div>
              <div class="swiper-button-next"></div>
              <div class="swiper-pagination"></div>
            </div>     
          </div>
        </div>
        <div class="col-lg-6">
          <div class="selected-product">
              <div class="product-category">{{$product->catName}}</div>
              <div class="product-name">{{$product->prodName}}</div>
              <div class="product-desc">{{$product->description}}</div>
              <div class="product-price">Price: <span>${{$product->priceOut}}</span></div>
              @if (Auth::user())
              <form action="{{url("user/addcart")}}" method="POST" class="pt-2 pb-3">
                @csrf   
                <div class="qty d-flex align-items-center mb-3">
                      Quentity:<input type="number" name="qty" pattern="[0-9]*" max="{{$product->stock}}" value="1" class="form-control" width="10px">
                    </div>
                    <input hidden  name="id" value="{{$product->prodId}}">
                    <input type="submit" value="Add Cart" class="btn btn-outline-danger">
              </form>
              @endif
        </div>
    </div>
  </div>
</section>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="{{asset('js/swipper.js')}}"></script>
  
<script>
    var swiper = new Swiper(".PSwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        pagination: {
        el: ".swiper-pagination",
        clickable: true,
        },
        navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
        },
    });
</script>
@endsection