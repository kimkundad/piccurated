@extends('admin.layouts.template')


@section('admin.stylesheet')
<link href="{{URL::asset('assets/upload_image/css/fileinput.css')}}" rel="stylesheet">
@stop('admin.stylesheet')


@section('admin.content')






        <section role="main" class="content-body">

          <header class="page-header">
            <h2>{{$datahead}}</h2>

            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <li>
                  <a href="{{url('admin/user')}}">
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



                        <style>
                        .form-group{
                          border-bottom: 1px solid #ddd;
                        }
                        </style>



                        <div class="col-md-8 col-lg-8">

          							<div class="tabs">

          								<div class="tab-content">

          									<div id="edit" class="tab-pane active">


                              <form  method="POST" action="{{url('admin/uodate_pay_user')}}" enctype="multipart/form-data">
                                          {{ csrf_field() }}
                                <input type="hidden" class="form-control" name="id" value="{{$objs->ids}}">
          											<h4 class="mb-xlg">แจ้งการชำระเงิน ออเดอร์ #{{ $objs->order_id }}</h4>

          											<fieldset>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ชื่อผู้แจ้งเรื่อง*</label>
          													<div class="col-md-8">
                                      <p>
                                        {{$objs->name}}
                                      </p>
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">เบอร์ติดต่อ*</label>
          													<div class="col-md-8">
                                      <p>
                                        {{$objs->phone}}
                                      </p>
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">อีเมล*</label>
          													<div class="col-md-8">
                                      <p>
                                        {{$objs->email}}
                                      </p>
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">จำนวนที่โอนเข้ามา*</label>
          													<div class="col-md-8">
                                      <p>
                                        {{$objs->money}}
                                      </p>
          														</div>
          												</div>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">เข้าธนาคาร*</label>
          													<div class="col-md-8">
                                      <p>
                                        {{$objs->name_bank}}
                                      </p>
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">วันเวลาที่แจ้งโอน*</label>
          													<div class="col-md-8">
                                      <p>
                                        {{$objs->date_transfer}} {{$objs->time_transfer}}
                                      </p>
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">หลักฐานการโอนเงิน</label>
          													<div class="col-md-8">
          														<img src="{{url('assets/image/slip_image/'.$objs->slip_image)}}" class="img-responsive" style="width:70%">
          														</div>
          												</div>


                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">*หมายเหตุ</label>
          													<div class="col-md-8">
          														<textarea class="form-control" name="note_detail"  rows="6">{{ $objs->note }}</textarea>
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">สถานะ</label>
          													<div class="col-md-8">
                                      <select name="confirm_status" class="form-control mb-md" required>

                                        <option value="0" @if( $objs->confirm_status == 0)
                                        selected='selected'
                                        @endif>ยังไม่ตรวจสอบ</option>

                                        <option value="1" @if( $objs->confirm_status == 1)
                                        selected='selected'
                                        @endif>ตรวจสอบแล้ว</option>

  								                    </select>
          														</div>
          												</div>



          											</fieldset>


          											<div class="panel-footer">
          												<div class="row">
          													<div class="col-md-9 col-md-offset-3">
          														<button type="submit" class="btn btn-primary">อัพเดทข้อมูล</button>
          														<button type="reset" class="btn btn-default">ยกเลิก</button>
          													</div>
          												</div>
          											</div>

          										</form>

          									</div>
          								</div>
          							</div>
          						</div>





            <style>
						.btn-file {
							width: 130px;
						}
						</style>




          						</div>




</section>
@stop



@section('scripts')
<script src="{{asset('/assets/javascripts/tables/examples.datatables.default.js')}}"></script>
<script src="{{URL::asset('assets/upload_image/js/fileinput.js')}}"></script>

@if ($message = Session::get('add_success_img'))
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


@if ($message = Session::get('del_success_img'))
<script type="text/javascript">

  var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
      var notice = new PNotify({
            title: 'ทำรายการสำเร็จ',
            text: 'ยินดีด้วย ได้ทำการลบรูปประกอบ สำเร็จเรียบร้อยแล้วค่ะ',
            type: 'success',
            addclass: 'stack-topright'
          });
</script>
@endif

@stop('scripts')
