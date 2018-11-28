@extends('layouts.template')

@section('title')
{{Auth::user()->name}} | Fulryu
@stop

@section('description')
ลม และ การไหลไป ความงามชั่วคราวซึ่งต้องมีประสบการณ์ตรง ณ ขณะนี้เท่านั้น เพราะในห้วงเวลาถัดไปความรู้สึกนั้นก็จะจางหายไปเหมือนหมอกเช้า
@stop

@section('og_tag')
<meta property="og:url"           content="https://fulryu.com" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Fulryu ความรู้สึกที่สัมผัสได้แต่ไม่สามารถมองเห็น" />
<meta property="og:image"         content="https://fulryu.com/assets/image/facebook_cover.png" />
<meta property="og:description"   content="ลม และ การไหลไป ความงามชั่วคราวซึ่งต้องมีประสบการณ์ตรง ณ ขณะนี้เท่านั้น เพราะในห้วงเวลาถัดไปความรู้สึกนั้นก็จะจางหายไปเหมือนหมอกเช้า" />
<meta property="og:image:width" content="600" />
<meta property="og:image:height" content="314" />
<meta property="fb:app_id" content="1916660355081132">
<meta property="fb:admins" content="100002037238809">
@stop

@section('stylesheet')
<link href="{{url('assets/bootstrap-sweetalert-master/dist/sweetalert.css')}}" rel="stylesheet">

<style>
.product-text {
    padding-top: 20px;
}
.tour_title{
 background: #979799; padding: 8px 15px 8px 15px; color: #fff;
}
.text_title{
  color: #fff; font-size:13px;     font-weight: 300;
}
</style>

@stop('stylesheet')
@section('content')

<!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-dark">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User profile</li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Breadcrumb Area End -->
	    <!-- Blog Section Start -->
	    <div class="checkout-area pt-80 pb-50">
	        <div class="container">
	            <div class="row ">


                <div class="col-lg-9 col-md-12">

                  <div class="panel-heading" id="headingOne">
                                    <h4 class="panel-title">
                                        <a>
                                            User Profile
                                        </a>
                                    </h4>
                                </div>


                                <div id="checkout" class="collapse show">
                                    <div class="panel-body">

                                      <h3 class="login-title">{{Auth::user()->name}}</h3>
                                      <h4>Edit Profile?</h4>
                                      <p>แก้ไขข้อมูลส่วนตัว :</p>
                                      <div class="login-form">
                                          <form action="{{url('user_profile_update')}}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                              <p>ชื่อ-สกุล*</p>
                                              <input type="text" name="name" value="{{Auth::user()->name}}" required="">
                                              <p>Email Adress*</p>
                                              <input type="email" name="email" value="{{Auth::user()->email}}" required="">
                                              <p>Mobile*</p>
                                              <input type="text" name="phone" value="{{Auth::user()->phone}}" >

                                              <p>วันเกิด*</p>
                                              <input type="text" class="datepicker" name="hbd" placeholder="__/__/____" value="{{Auth::user()->birthday}}" >

                                              <p>ที่อยู่ในการจัดส่ง*</p>
                                              <textarea name="address" rows="4" placeholder="Type Your Message......." required="">{{Auth::user()->address}}</textarea>

                                              <br />
                                              <br />

                                              <button type="submit" class="default-btn pull-right">SAVE CHANGES</button>
                                          </form>
                                      </div>
                                    </div>
                                </div>

                </div>

                <div class="col-lg-3 col-md-12">
                  <div class="checkout-progress">
                            <div class="section-title"><h4>Menu</h4></div>
                            <ul class="check">
                                <li><a href="{{url('user_profile')}}"><i class="fa fa-user"></i>User Profile</a></li>
                                <li><a href="{{url('my_order')}}"><i class="fa fa-cube"></i>รายการสั่งซื้อสินค้า</a></li>
                                <li><a href="{{url('logout')}}"><i class="fa fa-lock"></i>Logout</a></li>
                            </ul>
                        </div>
                </div>




	            </div>
	        </div>
	    </div>
	    <!-- Blog Section End -->



@endsection

@section('scripts')
<script src="{{URL::asset('assets/bootstrap-sweetalert-master/dist/sweetalert.js')}}"></script>

@if ($message = Session::get('edit_success'))
<script type="text/javascript">
swal("สำเร็จ!", "ทำการเปลี่ยนข้อมูลของคุณเรียบร้อยแล้ว!", "success")
</script>
@endif

@stop('scripts')
