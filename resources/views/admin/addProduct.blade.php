@include('admin.base.header');
@include('admin.base.sidebar');
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Common elements</a> </div>
  <h1>Adding and List of Brand</h1>
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
          <form action="{{url('/add-brand')}}" method="POST" class="form-horizontal">
            @csrf
            <div class="control-group">
              <label class="control-label">Product Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="product_name" placeholder="Product name" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Product Category :</label>
              <div class="controls">
                  <select name="category_name">
                    @foreach($productList as $productList)
                    <option>{{category->category_id}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Product Brand :</label>
              <div class="controls">
                  <select name="category_name">
                    @foreach($productList as $productList)
                    <option>{{category->brand_id}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Regular Price:</label>
              <div class="controls">
                <input type="text" class="span11" name="product_reguler_price" placeholder="Product name" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Sale Price :</label>
              <div class="controls">
                <input type="text" class="span11" name="product_sale_price" placeholder="Product name" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Short Decipion :</label>
              <div class="controls">
                <textarea type="text" class="span11" rows="6" name="product_short_description" placeholder="Product short Description"></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Logn Description :</label>
              <div class="controls">
                <textarea type="text" class="span11" rows="8" name="product_long_description" placeholder="Product long description"></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Quantity :</label>
              <div class="controls">
                <input type="text" class="span11" name="product_quantity" placeholder="Product name" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Product Attribute :</label>
              <div class="controls">
                <textarea type="text" class="span11" name="product_attribute" rows="4" placeholder="Product attribute" ></textarea>
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
                  <th>Serial No.</th>
                  <th>Product Name</th>
                  <th>Product Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($productList as $productList)
                <tr class="odd gradeX">
                  <td>{{$productList->id}}</td>
                  <td>{{$productList->prouct_name}}</td>
                  <td>{{$productList->product_category}}</td>
                  <td>
                    <a href="/delete-brand/{{$brand->id}}" class="btn btn-mini btn-danger" >Delete</a>
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