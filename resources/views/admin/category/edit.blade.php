@extends('admin.layouts.template')





@section('admin.content')






        <section role="main" class="content-body">

          <header class="page-header">
            <h2>{{$datahead}}</h2>

            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <li>
                  <a href="{{url('admin/dashboard')}}">
                    <i class="fa fa-home"></i>
                  </a>
                </li>

                <li><span>{{$datahead}}</span></li>
              </ol>

              <a class="sidebar-right-toggle" data-open="sidebar-right" ><i class="fa fa-chevron-left"></i></a>
            </div>
          </header>


          <!-- start: page -->



          <div class="row">
          							<div class="col-md-2 col-lg-2">




          							</div>







                        <div class="col-md-8 col-lg-8">

          							<div class="tabs">

          								<div class="tab-content">

          									<div id="edit" class="tab-pane active">


                              <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                                          {{ method_field($method) }}
                                          {{ csrf_field() }}

          											<h4 class="mb-xlg">แก้ไขหมวดหมู่</h4>

          											<fieldset>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ชื่อหมวดหมู่*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name_cat" value="{{$objs->name_cat}}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileAddress">หมวดหมู่หลัก*</label>
          													<div class="col-md-8">
          														<select name="id_main" class="form-control mb-md" required>

                                        <option value="">-- เลือกหมวดหมู่หลัก --</option>
  								                        @foreach($main_cat as $main_cats)
  													                 <option value="{{$main_cats->id}}"
                                               @if( $objs->id_main == $main_cats->id)
                                               selected='selected'
                                               @endif
                                               >{{$main_cats->name_main}}</option>
  													              @endforeach
  								                    </select>

          													</div>
          												</div>
                                  <br>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">รูป*</label>
          													<div class="col-md-8">
          														<img src="{{url('assets/image/category_img/'.$objs->image_cat)}}" class="img-responsive">
          														</div>
          												</div>


                                  <div class="form-group">
                                    <label class="col-md-3 control-label" for="exampleInputEmail1">รูปภาพ*</label>
                                    <div class="col-md-8">
                                      <p class="text-danger">
                                        ขนาดที่พอดี กว้าง 870 สูง 255 px
                                      </p>
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                              <div class="input-append">
                                                <div class="uneditable-input">
                                                  <i class="fa fa-file fileupload-exists"></i>
                                                  <span class="fileupload-preview"></span>
                                                </div>
                                                <span class="btn btn-default btn-file">
                                                  <span class="fileupload-exists">Change</span>
                                                  <span class="fileupload-new">Select file</span>
                                                  <input type="file" name="image">
                                                </span>
                                                <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                              </div>
                                            </div>
                                            </div>
                                  </div>







          											</fieldset>







          											<div class="panel-footer">
          												<div class="row">
          													<div class="col-md-9 col-md-offset-3">
          														<button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
          														<button type="reset" class="btn btn-default">ยกเลิก</button>
          													</div>
          												</div>
          											</div>

          										</form>

          									</div>
          								</div>
          							</div>
          						</div>









          						</div>




</section>
@stop



@section('scripts')
<script src="{{asset('/assets/javascripts/tables/examples.datatables.default.js')}}"></script>


@if ($message = Session::get('edit_success'))
<script type="text/javascript">

  var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
      var notice = new PNotify({
            title: 'ทำรายการสำเร็จ',
            text: 'ยินดีด้วย ได้ทำการแก้ไขข้อมูล สำเร็จเรียบร้อยแล้วค่ะ',
            type: 'success',
            addclass: 'stack-topright'
          });
</script>
@endif




@stop('scripts')
