@extends("layouts.adminlayout")
@section('content')
<section class="container">
    <div class="main-content container">
        <div class="main-head pt-5 pb-5 d-flex justify-content-between">
          <div>DashBoard</div>
          <div class="amount"> <a href="{{url('admin/safes')}}" class="text-decoration-none">$ {{number_format($total,2)}}</a></div>
        </div>
        <div class="row">
          <div class="col-md-4 mt-3">
            <a href="{{url('admin/showadmin')}}" class="text-decoration-none">
            <div class="content shadow-sm  rounded  mb-2 p-4 text-white bg-gradient">
              <div class="d-flex justify-content-between">
                <div class="content-head">Admins</div>
                <div class="content-img">
                  <i class="fa fa-user"></i>
                </div>
              </div>
              <div class="content-number">{{$admin}}</div>
            </div>    
          </a>  
        </div>
        <div class="col-md-4 mt-3">
          <a href="{{url('admin/showusers')}}" class="text-decoration-none">
            <div class="content shadow-sm  rounded mb-2 p-4 text-white bg-primary bg-gradient">
              <div class="d-flex justify-content-between">
                <div class="content-head">Users</div>
                <div class="content-img">
                  <i class="fa fa-user"></i>
                </div>
              </div>
              <div class="content-number">{{$user}}</div>
            </div>    
          </a>  
        </div>
        <div class="col-md-4 mt-3">
          <a href="{{url('admin/suppliers')}}" class="text-decoration-none">
            <div class="content shadow-sm  rounded mb-2 p-4 text-white bg-warning bg-gradient">
              <div class="d-flex justify-content-between">
                <div class="content-head">Suppliers</div>
                <div class="content-img">
                    <i class="fa fa-user-nurse"></i>
                </div>
              </div>
              <div class="content-number">{{$supplier}}</div>
            </div> 
          </a>     
        </div>
        <div class="col-md-4 mt-3">
          <a href="{{url('admin/categories')}}" class="text-decoration-none">
            <div class="content shadow-sm  rounded mb-2 p-4 text-white bg-success bg-gradient">
              <div class="d-flex justify-content-between">
                <div class="content-head">Categories</div>
                <div class="content-img">
                  <i class="fa fa-folder-open"></i>
                </div>
              </div>
              <div class="content-number">{{$cats}}</div>
            </div>      
          </a>
        </div>
        <div class="col-md-4 mt-3">
          <a href="{{url('admin/showorders')}}" class="text-decoration-none">
            <div class="content shadow-sm  rounded mb-2 p-4 text-white bg-danger bg-gradient">
              <div class="d-flex justify-content-between">
                <div class="content-head">Orders</div>
                <div class="content-img">
                  <i class="fa fa-box"></i>
                </div>
              </div>
              <div class="content-number">{{$order}}</div>
            </div>      
          </a>
        </div>
        <div class="col-md-4 mt-3">
          <a href="{{url('admin/shipments')}}" class="text-decoration-none">
            <div class="content shadow-sm  rounded mb-2 p-4 text-white bg-secondary bg-gradient">
              <div class="d-flex justify-content-between">
                <div class="content-head">Shipments</div>
                <div class="content-img">
                  <i class="fa fa-box"></i>
                </div>
              </div>
              <div class="content-number">{{$shipment}}</div>
            </div>      
          </a>
        </div>
        <div class="col-md-4 mt-3">
          <a href="{{url('admin/safes')}}" class="text-decoration-none">
            <div class="content shadow-sm  rounded mb-2 p-4 text-white bg-dark bg-gradient">
              <div class="d-flex justify-content-between">
                <div class="content-head">Safes</div>
                <div class="content-img">
                  <i class="fa fa-dollar-sign"></i></i>
                </div>
              </div>
              <div class="content-number">{{$safe}}</div>
            </div> 
          </a>     
        </div>
        <div class="col-md-4 mt-3">
          <a href="{{url('admin/complements')}}" class="text-decoration-none">
            <div class="content p-4 text-white">
              <div class="d-flex justify-content-between">
                <div class="content-head">Complements</div>
                <div class="content-img">
                  <i class="fa fa-comment"></i>
                </div>
              </div>
              <div class="content-number">{{$com}}</div>
            </div>   
          </a>   
        </div>
        <div class="col-md-4 mt-3">
          <a href="{{url('admin/products')}}" class="text-decoration-none">
            <div class="content shadow-sm  rounded mb-2 p-4 text-white burbel bg-gradient">
              <div class="d-flex justify-content-between">
                <div class="content-head">Products</div>
                <div class="content-img">
                  <i class="fa fa-product-hunt"></i>
                </div>
              </div>
              <div class="content-number">{{$prod}}</div>
            </div>   
          </a>   
        </div>
      </div>
    </div>
</section>
@endsection
