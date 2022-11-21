@include('admin.base.header');
@include('admin.base.sidebar');
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="/dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{url('/product')}}" class="tip-bottom">Add Product </a></div>
  <h1>Add New Product</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Personal-info</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="{{url('/updated-selected-product/'.$selectProduct->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="control-group">
              <label class="control-label">Product Name :</label>
              <div class="controls">
                <input type="text" value="{{$selectProduct->product_name}}" class="span11" name="product_name" placeholder="Product name" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Product Image :</label>
              <div class="controls">
                  <img src="{{asset($selectProduct->product_image)}}" width="200" height="200" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Product Images</label>
              <div class="controls">
                <input name="product_images[]" type="file" multiple />
              </div>
            </div>
          
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Upload Images</button>
            </div>
          </form>
        </div>
      </div>
    </div>
   
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>List of Brand</h5>
        </div>
        <div class="widget-content nopadding">
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Reguler Price</th>
                  <th>Sale Price</th>
                  <th>Quantity</th>
                  <th>Status</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($productList as $productList)
                <tr class="odd gradeX">
                  <td>{{$productList->product_name}}</td>
                  <td>{{$productList->product_reguler_price}}</td>
                  <td>
                    @if($productList->product_sale_price)
                      <strong>{{$productList->product_sale_price}}</strong>
                    @else
                        <strong>N/A</strong> 
                    @endif    
                  </td>
                  <td>{{$productList->product_quantity}}</td>
                  <td>
                    @if($productList->featured==0)
                      <button class="btn btn-mini btn-success" >Featured</button>
                    @else
                    <button class="btn btn-mini btn-warning" >Non-featured</button>
                    @endif
                  </td>
                  <td><img width="100" height="100" src="{{asset($productList->product_image)}}" /></td>
                  <td>
                    <a href="/update-product-image/{{$productList->id}}" class="btn btn-mini btn-info" >Update</a>
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