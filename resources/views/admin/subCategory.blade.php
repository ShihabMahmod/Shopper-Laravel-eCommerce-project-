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
          <form action="{{url('/add-sub-category')}}" method="POST" class="form-horizontal" enctype="multipart/form-data" >
            @csrf
            <div class="control-group">
              <label class="control-label">Sub Category Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="sub_category_name" placeholder="Sub Category Name" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Parent Category :</label>
              <div class="controls">
                  <select name="category_id">
                    @foreach($categoryList as $category)
                    <option value="{{$category->id}}" >{{$category->category_name}}</option>
                    @endforeach
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
          <h5>List of Sub Category</h5>
        </div>
        <div class="widget-content nopadding">
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Parent Name</th>
                  <th>Sub Category Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($subCategoryList as $subCategoryList)
                <tr class="odd gradeX">
                  <td>{{$subCategoryList->category_name}}</td>
                  <td>{{$subCategoryList->sub_category_name}}</td>
                  <td>
                    @if($subCategoryList->featured == 1)
                      <button class="btn btn-mini btn-success" >Draft</button>
                    @else
                    <button class="btn btn-mini btn-warning" >Publish</button>
                    @endif
                  </td>
                  <td>
                    <a href="/delete-sub-category/{{$subCategoryList->id}}" class="btn btn-mini btn-danger" >Delete</a>
                    <a href="/update-sub-category/{{$subCategoryList->id}}" class="btn btn-mini btn-info" >Update</a>
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