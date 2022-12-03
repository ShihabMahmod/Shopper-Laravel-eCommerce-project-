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
          <form action="{{url('/add-product')}}" method="POST" class="form-horizontal" enctype="multipart/form-data" >
            @csrf
            <div class="control-group">
              <label class="control-label">Product Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="product_name" placeholder="Product name" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Regular Price:</label>
              <div class="controls">
                <input type="text" class="span11" name="product_reguler_price" placeholder="Regular Price" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Sale Price :</label>
              <div class="controls">
                <input type="text" class="span11" name="product_sale_price" placeholder="Sale Price" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Short Decipion :</label>
              <div class="controls">
                <textarea type="text" class="span11" rows="6" name="product_short_description" placeholder="Short Description"></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Logn Description :</label>
              <div class="controls">
                <textarea type="text" class="span11" rows="8" name="product_long_description" placeholder="Long description"></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Quantity :</label>
              <div class="controls">
                <input type="text" class="span11" name="product_quantity" placeholder="Quantity" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Product Category :</label>
              <div class="controls">
                  <select name="category_id">
                    @foreach($categoryList as $category)
                    <option value="{{$category->id}}" >{{$category->category_name}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Product Sub-Category :</label>
              <div class="controls">
                  <select name="sub_category_id">
                    <option>Select Sub Category</option>
                    <option value="">No Sub-Category</option>
                    @foreach($subCategoryList as $subCategoryList)
                    <option value="{{$subCategoryList->id}}" >{{$subCategoryList->sub_category_name}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Product Brand :</label>
              <div class="controls">
                  <select name="brand_id">
                    @foreach($brandList as $brand)
                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Product Size :</label>
              <div class="controls">
                  <select name="product_size[]" multiple >
                    @foreach($sizeList as $sizeList)
                    <option value="{{$sizeList->size_name}}" >{{$sizeList->size_name}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Product color :</label>
              <div class="controls">
                  <select name="product_color[]" multiple >
                    @foreach($colorList as $colorList)
                    <option value="{{$colorList->name}}" >{{$colorList->name}}</option>
                    @endforeach
                  </select>
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
              <button type="submit" class="btn btn-success">Save</button>
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