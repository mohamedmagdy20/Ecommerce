@extends('layouts.adminlayout')
@section('content')

<section id="fixedBox" class="d-flex">
  <div class="tab bg-light p-5 rounded-3 shadow-sm ">
   <div id="choose" class="select text-center bg-dark w-50 m-auto p-4 shadow-sm rounded-3">
     <div class="pb-3 fs-3 fw-bold text-white">Select the kind of Products</div>
     <div class="d-flex justify-content-around align-items-center">
       <a href="{{url('admin/makeshipment')}}?shipment_id={{$shipment_id}}" class="btn btn-danger">Existing Products</a>
       <a href="{{url('admin/addproduct_shipment')}}?shipment_id={{$shipment_id}}" class="btn btn-warning text-white">New Products</a>
     </div>
     <a href="{{url('admin/shipments')}}" id="close"> <i class="fas fa-times"></i></a>
   </div>
 </section>

 @endsection