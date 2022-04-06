@extends('layouts.adminlayout')
@section('content')
<div class="container py-5">
    <div class="row">

        <div class="col-md-6 offset-md-3">
            <h3 class="mb-3">Order : {{$order->id}}</h3>
            <div class="card">
                <div class="card-body p-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr><th colspan="2" class="text-center">Customer</th>
                        </tr></thead>
                        <tbody>
                          <tr>
                            <th scope="row">Name</th>
                            <td>{{$order->name}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Email</th>
                            <td>{{$order->email}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Phone</th>
                            <td>{{$order->phone}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Address</th>
                            <td>{{$order->address}}</td>
                          </tr>
                          <tr>
                            <th scope="row">{{$order->created_at}}</th>
                          </tr>
                          <tr>
                            <th scope="row">Status</th>
                            <td>{{$order->statue}}</td>
                          </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        @foreach ($order_details as $prod )
                            <tr>
                            <td>{{$prod->prodName}}</td>
                            <td>{{$prod->stock}}</td>
                            <td>{{$prod->prodPrice}}</td>
                        </tr>
                         @endforeach
                       
                          
                        </tbody>
                    </table>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>${{$total}}</td>
                            <td>  
                                @if ($order->statue =='pending')
                                <a class="btn btn-success" href="{{url("admin/approve/$order->id")}}">Approve</a>
                                <a class="btn btn-danger" href="{{url("admin/cencel/$order->id")}}">Cancel</a>
                                @endif
                            </td>
                          </tr>
                        </tbody>
                    </table>

                    <a class="btn btn-dark" href="{{url('admin/showorders')}}">Back</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection