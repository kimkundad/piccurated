@extends('layouts.template')

@section('title')
Payment Options | Fulryu
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
                        <li class="breadcrumb-item active" aria-current="page">Payment Options</li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Breadcrumb Area End -->
	    <!-- Blog Section Start -->
	    <div class="about-skill-area pt-80 pb-50">
	        <div class="container">
	            <div class="row justify-content-center">

                <div class="col-lg-8">
                  <h3>Payment Options</h3>
                  <p style="font-size:15px;"><b>ช่องทางการชำระเงิน </b></p>
                  <p>
                    ณ ปัจจุบันท่านสามารถชำระเงินได้โดยผ่านทางธนาคาร จากนั้นกรุณาแจ้งการชำระเงินผ่านทาง Website ในหน้า account ของท่าน
                    และเลือกยืนยันการชำระเงินพร้อมกรอกข้อมูลให้ครบถ้วน หรือท่านสามารถโทรศัพท์มาแจ้งทางเราได้ที่เบอร์ เบอร์ +(66)639911075 <br /> ระหว่างเวลา 8.00 - 22.00 น. ทุกวัน
                  </p>


                  <div class="checkout-buttons">
                    <div class="table-responsive">

                        <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>ชื่อบัญชี</th>
                            <th>เลขที่บัญชี</th>
                            <th>สาขา</th>

                          </tr>
                        </thead>
                        <tbody>


                          @if($bank)
                          @foreach($bank as $u)
                          <tr>
                            <td>
                              <img src="{{url('assets/images/bank/'.$u->bank_img)}}" height="35">
                            </td>
                            <td class="p_top">
                              {{$u->name_b}}
                            </td>
                            <td class="p_top">
                              {{$u->name_no_b}}
                            </td>
                            <td class="p_top">
                              {{$u->major_name_b}}
                            </td>
                          </tr>
                          @endforeach
                          @endif



                        </tbody>
                        </table>
                        </div>
                                          </div>


                                          <br />

                                          <h4>บัตรเครดิต</h4>
                                          <p style="font-size:15px;"><b>ยินดีรับการชำระเงินผ่านบัตรเครดิตและบัตรเดบิต </b></p>

                                          <p>
                                            ทุกธุรกรรมผ่านบัตรเครดิตและบัตรเดบิตได้รับการรับรองความปลอดภัยด้วยเทคโนโลยี 2c2p Payment gateway api, Paypal
                                            ที่ได้รับการรับรองแล้ว คุณจะได้รับการยืนยันและตั๋วอิเล็กทรอนิกส์ผ่านทางอีเมล์ภายใน 60 นาที ภายหลังจากที่ชำระเงินเสร็จสิ้น
                                          </p>
                                          <img src="{{url('assets/image/logo-master-card2.png')}}" height="29">
                                          <img src="{{url('assets/image/paypal_bt.png')}}" height="29">
                                          <br />
                                          <hr />
                                          <br />





                </div>


	            </div>
	        </div>
	    </div>
	    <!-- Blog Section End -->



@endsection

@section('scripts')



@stop('scripts')
