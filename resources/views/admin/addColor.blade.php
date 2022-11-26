@include('admin.base.header');
@include('admin.base.sidebar');
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Common elements</a> </div>
  <h1>Adding Color</h1>
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
          <form action="{{url('/add-color')}}" method="POST" class="form-horizontal">
            @csrf
            <div class="control-group">
              <label class="control-label">Color Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="color_name" placeholder="Color name" />
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
                  <th>Color Name</th>
                  <th>COlor Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($colorList as $colorList)
                <tr class="odd gradeX">
                  <td>{{$colorList->id}}</td>
                  <td>{{$colorList->name}}</td>
                  <td>{{$colorList->status}}</td>
                  <td>
                    <a href="/delete-brand/{{$colorList->id}}" class="btn btn-mini btn-danger" >Delete</a>
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