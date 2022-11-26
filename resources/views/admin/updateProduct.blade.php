@include('admin.base.header');
@include('admin.base.sidebar');
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="/dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{url('/product')}}" class="tip-bottom">Add Product </a></div>
  <h1>Update Product</h1>
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
          @foreach($productData as $products)
          <form action="{{url('/updated-selected-product/'.$products->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="control-group">
              <label class="control-label">Product Name :</label>
              <div class="controls">
                <input type="text" value="{{$products->product_name}}" class="span11" name="product_name" placeholder="Product name" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Regular Price:</label>
              <div class="controls">
                <input type="text" value="{{$products->product_reguler_price}}" class="span11" name="product_reguler_price" placeholder="Regular Price" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Sale Price :</label>
              <div class="controls">
                <input type="text" value="{{$products->product_sale_price}}" class="span11" name="product_sale_price" placeholder="Sale Price" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Short Decipion :</label>
              <div class="controls">
                <textarea type="text"  class="span11" rows="6" name="product_short_description" placeholder="Short Description">{{$products->product_short_description}}</textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Logn Description :</label>
              <div class="controls">
                <textarea type="text"  class="span11" rows="8" name="product_long_description" placeholder="Long description">{{$products->product_logn_description}}</textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Quantity :</label>
              <div class="controls">
                <input type="text" value= "{{$products->product_quantity}}" class="span11" name="product_quantity" placeholder="Quantity" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Product Attribute :</label>
              <div class="controls">
                <textarea type="text" class="span11" name="product_attribute" rows="4" placeholder="Product attribute" >{{$products->product_attribute}}</textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Product Category :</label>
              <div class="controls">
                  <select name="category_id">
                    @foreach($categoryList as $categories)
                      <option value="{{$categories->id}}" >{{$categories->category_name}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Product Brand :</label>
              <div class="controls">
                  <select name="brand_id">           
                    @foreach($brandList as $brands)
                        <option value="{{$brands->id}}">{{$brands->brand_name}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Product Image :</label>
              <div class="controls">
                  <img src="{{asset($products->product_image)}}" width="200" height="200" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Product Image</label>
              <div class="controls">
                <input name="product_image" type="file" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Image Gellery</label>
              <div class="controls">
                <input name="product_images[]" type="file" multiple />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Product Status :</label>
              <div class="controls">
                  <select name="featured">   
                    <option value="1">Featured</option>
                    <option value="0" >Non-featured</option>
                  </select>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Update</button>
            </div>
          </form>
          @endforeach
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
                  <td>{{$productList->product_sale_price}}</td>
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
                    <a href="/delete-product/{{$productList->id}}" class="btn btn-mini btn-danger" >Delete</a>
                    <a href="/update-product/{{$productList->id}}" class="btn btn-mini btn-info" >Update</a>
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