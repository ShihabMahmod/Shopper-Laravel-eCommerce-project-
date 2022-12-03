@include('admin.base.header');
@include('admin.base.sidebar');
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="/dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{url('/product')}}" class="tip-bottom">Add Product </a></div>
  <h1>Order Details</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">   
    <div class="span4">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Customer Info</h5>
        </div>
        <div class="widget-content nopadding">
          <div class="widget-content nopadding">
            <div class="user-profile">
              <div class="profile-image" style="float: left;border:1px solid #CDCDCD;">
               <img class="mb-3" style="border-radius:50%;" src="{{asset($customer->image)}}" alt="assets/images/default-user.png">
               <h4>{{$customer->name}}</h4>
                    <ul class="list-group" id="sidebar-nav-1">
                          <li class="list-group-item">
                              <p><i class="icon-user" ></i>Full Name : {{$customer->first_name}} {{$customer->last_name}}<p>
                          </li>
                          <li class="list-group-item">
                              <p><i class="icon-envelope"></i> Email : {{$customer->email}}<p>
                          </li>                                        
                          <li class="list-group-item">
                              <p><i class="icon-phone"></i>Phone : {{$customer->phone}}<p>
                          </li>
                          <li class="list-group-item">
                              <p><i class="icon icon-home"></i> Address : {{$customer->address}}<p>
                          </li>                                        
                          <li class="list-group-item active">
                              <p><i class="icon icon-home"></i>City : {{$customer->city}}</p>
                          </li>                                       
                          <li class="list-group-item">
                              <p><i class="icon icon-file"></i> Zip : {{$customer->zip}}</p>
                          </li> 
                      </ul> 
              </div>
            </div>
            
          </div>
        </div>
      </div>
  </div>
  <div class="span8">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Ordard Product</h5>
        </div>
        <div class="widget-content nopadding">
          <div class="widget-content nopadding">
          <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Color</th>
                  <th>size</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($orders as $productList)
             <tr class="odd gradeX">
                  <td>{{$productList->product_name}}</td>
                  <td>{{$productList->order_price}}</td>
                  <td>{{$productList->product_quantity}}</td>
                  <td>
                    @if($productList->product_color)
                      <strong>{{$productList->product_color}}</strong>
                    @else
                        <strong>N/A</strong> 
                    @endif    
                  </td>
                  <td>
                    @if($productList->product_size)
                      <strong>{{$productList->product_size}}</strong>
                    @else
                        <strong>N/A</strong> 
                    @endif    
                  </td>
                  <td><img width="100" height="100" src="{{asset($productList->product_image)}}" /></td>
                  <td>
                    <a href="{{url('/invoice-generate/'.$productList->user_id)}}" class="btn btn-mini btn-info" >Invoice</a>
                    @if($productList->order_status == 0)
                     <a href="/update-order-status/{{$productList->id}}" class="btn btn-mini btn-success" >Confirm</a>
                    @else
                      <a href="/update-product/{{$productList->id}}" class="btn btn-mini btn-danger" >Delete</a> 
                    @endif
                  </td>
                </tr>
              @endforeach
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
</div>
</div>
@include('admin.base.footer');