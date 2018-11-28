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



                        <style>
                        .form-group{
                          border-bottom: 1px solid #ddd;
                        }
                        </style>



                        <div class="col-md-8 col-lg-8">

          							<div class="tabs">

          								<div class="tab-content">

          									<div id="edit" class="tab-pane active">


                              <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                                          {{ method_field($method) }}
                                          {{ csrf_field() }}

          											<h4 class="mb-xlg">คำสั่งซื้อที่ {{ $objs->id }}</h4>

          											<fieldset>


                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ชื่อลูกค้า*</label>
          													<div class="col-md-8">
                                      <p>
                                        {{$objs->fname}} {{$objs->lname}}
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
                                        <input type="hidden" class="form-control" name="ems_tracking_email" value="{{$objs->email}}">
                                      </p>
          														</div>
          												</div>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">บริษัท*</label>
          													<div class="col-md-8">
                                      <p>
                                        {{$objs->company}}
                                      </p>
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ที่อยู่ในการจัดส่ง*</label>
          													<div class="col-md-8">
                                      <p>
                                        {{$objs->address}} {{$objs->city}}  {{$objs->province}} {{$objs->country}}  {{$objs->zip_code}}
                                      </p>
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">จำนวนเงินรวม*</label>
          													<div class="col-md-8">
                                      <p>
                                        {{$objs->total_money}}
                                      </p>
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ส่วนลด*</label>
          													<div class="col-md-8">
                                      <p>
                                        {{$objs->discount}}
                                      </p>
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">สถานะสินค้า*</label>
          													<div class="col-md-8">
                                      <select name="order_status_show" class="form-control mb-md" required>

                                        <option value="0"
                                        @if( $objs->order_status_show == 0)
                                        selected='selected'
                                        @endif
                                        >-- รอการตรวจสอบ --</option>
                                        <option value="1"
                                        @if( $objs->order_status_show == 1)
                                        selected='selected'
                                        @endif
                                        >-- อยู่ระหว่างการจัดส่ง --</option>

  								                    </select>

          														</div>
          												</div>


                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ems tracking*</label>
          													<div class="col-md-8">
                                      <input type="text" class="form-control" name="ems_tracking" value="{{ $objs->ems_tracking }}">
                                      <br />
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">บันทึก (เจ้าหน้าที่)*</label>
          													<div class="col-md-8">
                                      <textarea class="form-control" name="note" rows="4">{{ $objs->note }}</textarea>
                                      <br />
          														</div>
          												</div>


                                  <h4>รายการที่สั่ง</h4>

                                  @if($order)
                                  @foreach($order as $k)
                                  <div class="form-group">
          													<label class="col-md-4 control-label" for="profileFirstName"><a href="{{url('admin/product/'.$k->id_p.'/edit')}}" target="_blank">{{$k->product_name}}

                                    </a></label>
                                    <div class="col-md-2"><img src="{{url('assets/image/product/'.$k->pro_image)}}" class="img-responsive" style=" width:100%" /></div>
          													<div class="col-md-6">
                                      สั่งจำนวน : {{$k->sum_item}} PCS / ฿ {{$k->pro_price}}<br />
                                      ราคารวม : {{$k->sum_money}}<br />
                                      color : {{$k->get_color}} <br />
                                      size : {{$k->get_size}} <br /><br />
          														</div>

          												</div>
                                  @endforeach
                                  @endif

                                  <h4>แจ้งการโอนเงิน</h4>

                                  @if($confirm != null)
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ชื่อผู้โอนเงิน*</label>
          													<div class="col-md-8">
                                      <p>
                                        {{$confirm->name}}
                                      </p>
          														</div>
          												</div>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">เบอร์ติดต่อ*</label>
          													<div class="col-md-8">
                                      <p>
                                        {{$confirm->phone}}
                                      </p>
          														</div>
          												</div>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">email*</label>
          													<div class="col-md-8">
                                      <p>
                                        {{$confirm->email}}
                                      </p>
          														</div>
          												</div>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ยอดโอน*</label>
          													<div class="col-md-8">
                                      <p>
                                        {{$confirm->money}}
                                      </p>
          														</div>
          												</div>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">วันที่โอน / เวลา *</label>
          													<div class="col-md-8">
                                      <p>
                                        {{$confirm->date_transfer}} {{$confirm->time_transfer}}
                                      </p>
          														</div>
          												</div>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">โอนเข้าธนาคาร *</label>
          													<div class="col-md-8">
                                      {{$bank->name_bank}} {{$bank->name_b}} {{$bank->name_no_b}}
          														</div>
          												</div>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">เอกสารโอนเงิน *</label>
          													<div class="col-md-8">
                                      <img src="{{url('assets/image/slip_image/'.$confirm->slip_image)}}" class="img-responsive" style="height:100%;" />
          														</div>
          												</div>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">Note *</label>
          													<div class="col-md-8">
                                      <p>
                                        {{$confirm->note}}
                                      </p>
          														</div>
          												</div>
                                  @else
                                  <div class="form-group">
          													<h5>ยังไม่มีการโอนเงิน</h5>

          												</div>
                                  @endif


                                  <!-- ems tracking -->














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
