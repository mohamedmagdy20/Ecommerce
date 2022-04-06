@extends('layouts.adminlayout')
@section('content')
<div class="container pt-5">
    <form action="{{url('admin/store_selected_shipment')}}" method="POST">
        @csrf
        <label for="">Stock</label>
        <input type="number" class="form-control mb-2" name="stock" value="{{$prodnum->stock}}">
        <input type="hidden" name="priceIn" class="form-control" value="{{$prodnum->priceIn}}">
        <input type="hidden" name="shipment_id" value="{{$shipment_id}}">
        <input type="hidden" name="prodId" value="{{$prodnum->id}}">
        <input type="submit" class="btn btn-dark" value="Submit">
    </form>
</div>
@endsection