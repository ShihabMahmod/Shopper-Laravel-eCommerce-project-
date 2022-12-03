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
          <form method="POST" action="{{url('/add-slider')}}"  class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="control-group">
              <label class="control-label">Title:</label>
              <div class="controls">
                <input type="text" class="span11" name="title" placeholder="Slider Title" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Slug:</label>
              <div class="controls">
                <textarea class="span11" row="6" name="slug" placeholder="Slider Slug" ></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Slider Image:</label>
              <div class="controls">
                <input type="file" class="span11" name="slider" />
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
              @foreach($sliderList as $sliders)
              <tr class="even gradeA">
                  <td>{{$sliders->id}}</td>
                  <td>{{$sliders->title}}</td>
                  @if($sliders->slider_status == 0)
                    <td>
                      <a href="{{url('/de-active-category/'.$sliders->id)}}" class="btn btn-mini btn-success">Active</a>
                    </td>
                  @else
                    <td>
                      <a href="{{url('/active-category/'.$sliders->id)}}" class="btn btn-mini btn-danger">De active</a>
                    </td>
                  @endif
                  <td><img src="{{asset($sliders->slider)}}"></td>
                  <td>
                    <a class="btn btn-mini btn-danger" href="/delete-category/{{$sliders->id}}">Delete</a>
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