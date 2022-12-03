@include('admin.base.header');
@include('admin.base.sidebar');
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Common elements</a> </div>
  <h1>Common Form Elements</h1>
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
          <form method="POST" action="{{url('/add-category')}}"  class="form-horizontal">
            @csrf
            <div class="control-group">
              <label class="control-label">Category Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="category_name" placeholder="Category name" />
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
        <div class="widget-content nopadding">
        <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Category List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Serial No.</th>
                  <th>category Name</th>
                  <th>Category Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($category as $categories)
              <tr class="even gradeA">
                  <td>{{$categories->id}}</td>
                  <td>{{$categories->category_name}}</td>
                  @if($categories->category_status == 0)
                    <td>
                      <a href="{{url('/de-active-category/'.$categories->id)}}" class="btn btn-mini btn-success">Active</a>
                    </td>
                  @else
                    <td>
                      <a href="{{url('/active-category/'.$categories->id)}}" class="btn btn-mini btn-danger">De active</a>
                    </td>
                  @endif
                  <td>
                    <a class="btn btn-mini btn-danger" href="/delete-category/{{$categories->id}}">Delete</a>
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