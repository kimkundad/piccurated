@extends('layouts.template')

@section('title')
ชำระเงืนสำเร็จ | piccurated
@stop

@section('description')
piccurated is online natural printing, art gallery. Connecting between art, photos and inspiration with artists and photographers you love.
@stop

@section('og_tag')
<meta property="og:url"           content="https://piccurated.com" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="piccurated  is online natural printing, art gallery" />
<meta property="og:image"         content="https://piccurated.com/assets/image/facebook_cover.png?v2" />
<meta property="og:description"   content="piccurated is online natural printing, art gallery. Connecting between art, photos and inspiration with artists and photographers you love." />
<meta property="og:image:width" content="600" />
<meta property="og:image:height" content="314" />
<meta property="fb:app_id" content="355004925273070">
<meta property="fb:admins" content="100002037238809">
@stop

@section('stylesheet')

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
                        <li class="breadcrumb-item active" aria-current="page">แจ้งชำระเงิน</li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Breadcrumb Area End -->
	    <!-- Blog Section Start -->
	    <div class="checkout-area pt-80">
	        <div class="container">
	            <div class="row justify-content-center">

                <div class="col-lg-8">
                  <div class="panel-heading" id="headingOne">
                                    <h4 class="panel-title">
                                        <a>
                                            แจ้งชำระเงินสำเร็จแล้ว
                                        </a>
                                    </h4>
                                </div>


                                <div id="checkout" class="collapse show">
                                    <div class="panel-body">

                                      <h3 class="login-title">คุณได้ทำการชำระเงินผ่าน PayPal</h3>

                                      <p> เราจะทำการตรวจสอบยอดเงินที่ท่านโอนเข้ามา ตามหมายเลขการสั่งซื้อ หากทำการตรวจสอบยอดเงินที่ชำระมาอย่างถูกต้องแล้ว เราจะทำการส่ง ใบเสร็จการสั่งซื้อไปให้ ใน
                                      ระบบ user profile และใน eamil ของที่ท่านได้ลงทะเบียนเอาไว้ </p>
                                      <img src="{{url('assets/image/logo-master-card2.png')}}" height="29">
                                      <img src="{{url('assets/image/paypal_bt.png')}}" height="29">
                                      <br /><br />
                                      <p>
                                        <b>การตีคืนการชำระเงิน</b> - โปรดทราบว่าการชำระเงินของคุณอาจถูกตีคืน (เช่น ในกรณีที่มีการปฏิเสธชำระเงิน) แม้ว่าคุณจะได้ส่งสินค้าให้ผู้ซื้อแล้ว การปฏิบัติตามนโยบายคุ้มครองผู้ขายของ PayPal และทำตามแนวปฏิบัติทางการค้าในศูนย์ข้อมูลความปลอดภัยของเราจะช่วยคุ้มครองคุณจากกรณีต่างๆ เช่น การปฏิเสธชำระเงิน
                                        <br />
                                        <b>ข้อมูลการคืนเงิน</b> - โปรดยอมรับหรือปฏิเสธการชำระเงินนี้ ถ้าคุณยอมรับการชำระเงินนี้เดี๋ยวนี้ แต่จำเป็นต้องคืนเงินในภายหลัง จะมีลิงก์ 'คืนเงิน' บนหน้ารายละเอียดการทำรายการเป็นเวลา 180 วันหลังจากชำระเงิน
                                      </p>

                                      <a href="{{url('/')}}" class="default-btn" style="color:#fff"><span>กลับไปหน้าหลัก</span></a>
                                    </div>
                                </div>



                </div>


	            </div>
	        </div>
	    </div>
	    <!-- Blog Section End -->



@endsection

@section('scripts')



@stop('scripts')
