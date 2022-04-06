@extends("layouts.user-layout")
@section('user-content')
<section class="Carts">
    <div class="container">
        @if(Session::has('success'))
        <div id="success" class="text-center fs-4 alert alert-success">
            {{Session::get('success')}}
        </div>
      @endif
    <div class="cart d-flex justify-content-around align-items-center mt-4 mb-3 shadow p-3 mb-5 rounded">
        <div class="cart-total d-flex justify-content-center">
            <div class="pe-2">Total: </div>
            <div>${{ $total}}</div>
        </div>
        <div class="cart-total d-flex justify-content-center">
            <div class="pe-2">Cart:</div>
            <div>{{$cartcount->count}}</div>
        </div>
    </div>
    {{-- @foreach ($carts as $item )
        <p>{{$item->prodName}}</p>    
    @endforeach --}}
    <table class="table">
        <thead class="table tablehead text-white">
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Img</th>
                <th scope="col">Delete</th>
              </tr>
        </thead>
        <tbody>
          @foreach ($carts as $index => $item )
          <tr class="text-center">
          <th scope="row">{{$index}}</th>
          <th scope="">{{$item->prodName}}</th>
          <th scope="">{{$item->priceOut}}</th>
          <th scope="">{{$item->quantity}}</th>
          <th class="imgrow"><img  src="{{url("uploads/$item->prodImg")}}" alt="Img"></th>
          <th scope=""><a href="{{url("user/deletecart/$item->cartId")}}"><i class="fas fa-trash text-danger"></i></a></th>     
        </tr>
          @endforeach

        </tbody>
      </table>
    <div class="pt-4 pb-5">
    <form method="POST" action="/user/checkout">
        <div class="fs-3 fw-bolder pb-3">Fill Your info</div>
        @csrf
        <label class="mb-2 fw-bold text-danger" for="">Enter Address</label>
        <input type="text" name="address"  class="form-control mb-3" placeholder="Address"/>
        @error('address')
        <div class="text-center alert alert-danger">
            <h6>{{$message}}</h6> 
        </div>
        @enderror
        <label class="mb-2 fw-bold text-danger" for="">Phone</label>
        <input type="text" name="phone" class="form-control mb-3" placeholder="Phone"/>
        @error('phone')
        <div class="text-center alert alert-danger">
            <h6>{{$message}}</h6> 
        </div>
        @enderror
        <label class="mb-2 fw-bold text-danger" for="">Enter Bank</label>
        <select id="input" name="safes" class="form-select mb-3" aria-label="Default select example">
            @foreach ($safes as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>    
            @endforeach     
          </select>
          @error("safes")
          <div id="success" class="text-center alert alert-danger">
              <h6>{{$message}}</h6> 
          </div>
          @enderror
        <button type="submit" class="btn btn-danger">Submit Order</button>
    </form>
</div>
</div>
</section>
@endsection
 