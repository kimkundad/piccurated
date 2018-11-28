@extends('admin.layouts.template')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="{{url('assets/text/dist/summernote.css')}}?v2" rel="stylesheet">
@section('admin.content')
<!-- start: sidebar -->
<style>
.note-editor.note-frame .note-editing-area .note-editable{
      padding: 30px;
}
.select2-search-choice-close{
  top: 10px !important;
  color: #999;
    cursor: pointer;
    display: inline-block;
    font-weight: 700;
    margin-right: 3px;
    background:none !important;
}
.select2-search-choice-close:after {
    content: 'x';
    font-size: 10px;
    color: #000!important;
    padding: 0 4px;
    font-weight: bold;
}
</style>
<style>
.note-editor.note-frame .note-editing-area .note-editable {
    padding-left: 50px;
    padding-right: 50px;
}
</style>




        <section role="main" class="content-body">

          <header class="page-header">
            <h2>{{$header}}</h2>

            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <li>
                  <a href="dashboard.html">
                    <i class="fa fa-home"></i>
                  </a>
                </li>

                <li><span>{{$header}}</span></li>
              </ol>

              <a class="sidebar-right-toggle" data-open="sidebar-right" ><i class="fa fa-chevron-left"></i></a>
            </div>
          </header>


          <!-- start: page -->

<style>
.fileupload .uneditable-input .fa {
    position: absolute;
    margin-top: 4px;
    /* top: 12px; */
}
</style>

           <div class="row">
              <div class="row">
                <div class="col-xs-1">
                </div>
              <div class="col-xs-10">

            <section class="panel">
              <header class="panel-heading">
                <div class="panel-actions">
                  <a href="#"  class="panel-action panel-action-toggle" data-panel-toggle></a>

                </div>

                <h2 class="panel-title">{{$header}}</h2>
              </header>
              <div class="panel-body">



              <form action="{{$url}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field($method) }}


                <div class="form-group">
                  <label for="exampleInputEmail1">ชื่อ บทความ</label>
                  <input type="text" class="form-control" name="blog_title" placeholder="ใส่ชื่อ บทความ"  value="{{ $blog->blog_title }}" required>

                </div>





                <div class="form-group">
                  <label >เลือกหมวดหมู่ บทความ</label>
                    <select name="blog_cat" class="form-control mb-md" required="required">
                      @if($objs)
                        @foreach($objs as $u)
                          <option value="{{$u->id}}" @if($blog->blog_cat == $u->id)
                                        selected='selected'
                                        @endif>{{$u->name_blog_cat}}</option>
                        @endforeach
                      @endif


                    </select>
                </div>

                <div class="form-group">
                  <label >เลือกประเภท บทความ</label>
                    <select name="blog_type" class="form-control mb-md" required="required">
                      <option value="0" @if($blog->blog_type == 0)
                                    selected='selected'
                                    @endif>บทความ</option>
                      <option value="1" @if($blog->blog_type == 1)
                                    selected='selected'
                                    @endif>Youtube</option>
                    </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">URL บทความ <span class="text-danger">**ใส่กรณี ประเภท บทความเป็น Youtube</span></label>
                  <input type="text" class="form-control" name="blog_url" placeholder="ใส่หัวข้อบทความ"  value="{{ $blog->blog_url }}" >

                </div>


                <div class="form-group">
                  <label >สินค้าของ บทความ</label>
                    <select name="set_product" class="form-control mb-md" required="required">
                      <option value="" >สินค้าของ บทความ</option>
                        @if($product)
                          @foreach($product as $u)
                          <option value="{{$u->id}}" @if($blog->set_product == $u->id)
                                      selected='selected'
                                      @endif>{{$u->pro_name}}
                          </option>
                        @endforeach
                      @endif

                    </select>
                </div>


                <div class="form-group">
												<label class=" control-label text-lg-right pt-2">สินค้าที่เกี่ยวข้อง</label>

													<select multiple data-plugin-selectTwo name="product[]" class="form-control populate">
														<optgroup label="เลือกสินค้าที่เกี่ยวข้อง">
                              @if($product)
                                @foreach($product as $u)
															<option value="{{$u->id}}" @if($u->option == 1)
                                            selected='selected'
                                            @endif>{{$u->pro_name}}</option>
                              @endforeach
                            @endif
														</optgroup>

													</select>

											</div>





                <div class="form-group">
                  <label for="exampleInputEmail1">รูป บทความ</label>
                  <img src="{{url('assets/image/blog/'.$blog->blog_img)}}" class="img-responsive" style="width:50%">
                </div>



                <div class="form-group">
                  <label for="exampleInputEmail1">รูป บทความ <span class="text-danger">1024 x 683 px หรือแนวนอนขนาดใกล้เคียง</span></label>
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

                <div class="form-group">
                  <label for="exampleInputEmail1">รายละเอียด</label>
                  <textarea class="form-control" name="blog_detail" id="summernote" rows="4" required>{{ $blog->blog_detail }}</textarea>

                </div>


              <button type="submit" class="btn btn-default pull-right">อัพเดท บทความ</button>
              <br>
              <br>
            </form>

              </div>
            </section>

              </div>
              <div class="col-xs-1">
              </div>
            </div>
        </div>
</section>



@stop

@section('scripts')



<script src="{{URL::asset('assets/text/dist/summernote.js?v5.1')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
  $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
  $('#summernote').summernote({

    fontNames: ['Prompt' ,'Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
    disableDragAndDrop: true,            // set editor height
    placeholder: 'เนื้อหาบทความ',
    minHeight: 300,
    focus: true                // set focus to editable area after initializing summernote
  });
});
var postForm = function() {
var content = $('textarea[name="blog_detail"]').html($('#summernote').code());
}
</script>


@if ($message = Session::get('add_success'))
<script type="text/javascript">

  var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
      var notice = new PNotify({
            title: 'ทำรายการสำเร็จ',
            text: 'ยินดีด้วย ได้ทำการเพิ่มข้อมูล สำเร็จเรียบร้อยแล้วค่ะ',
            type: 'success',
            addclass: 'stack-topright'
          });
</script>
@endif

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
