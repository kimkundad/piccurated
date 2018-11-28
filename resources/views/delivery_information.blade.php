@extends('layouts.template')

@section('title')
ช่องทางการส่งสินค้า | Fulryu
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
                        <li class="breadcrumb-item active" aria-current="page">ช่องทางการส่งสินค้า</li>
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
                  <h3>ช่องทางการส่งสินค้า</h3>
                  <p style="font-size:14px;"><b>ลูกค้าสามารถเลือกรับรูปได้ถึง 4 ช่องทาง ตามความสะดวกดังนี้ค่ะ</b></p>
                  <ol>
                    <li>
                      จัดส่งฟรี! แบบไปรษณีย์ลงทะเบียน เมื่อมียอด 300 บาทขึ้นไป (เฉพาะอัดรูปสี และสินค้าอื่นๆ ที่มีน้ำหนักเบา)
                    </li>
                    <li>
                      จัดส่งแบบ Kerry Express <a href="#Kerry">(รายละเอียดเพิ่มเติม)</a>
                    </li>
                    <li>
                      ให้บริการจัดส่ง EMS ไปรษณีย์ไทย<a href="#">(รายละเอียดเพิ่มเติม)</a>
                    </li>

                    <li>
                      จัดส่ง Delivery ถึงบ้านหรือที่ทำงาน เฉพาะกรุงเทพฯ ในเขตพื้นที่บริการ
                    </li>

                  </ol>
                  <br />
                  <hr />
                  <div class="col-md-12">
                    <h4 id="Kerry">จัดส่งแบบ Kerry Express</h4>
                    <br />
                    <a class="banner-image">
                    <img src="{{url('assets/image/kerry_express.gif')}}" alt=" Kerry Express"/>
                   </a>
                   <br /><br />
                   <h5>บริการใหม่จัดส่งด่วนภายใน 1 วัน ส่งวันนี้ถึงพรุ่งนี้ทุกที่ทั่วไทย</h5>
                   <br />
                   <ui>
                     <li>
                       ลูกค้าต้องส่งไฟล์งานและ ชำระเงินก่อนเวลา 10:00 น. ของจะส่งถึงปลายทางในวันถัดไป
                     </li>
                     <li>
                       ลูกค้าที่สั่งงานมาวันเสาร์ ของจะจัดส่งถึงปลายทางในวันจันทร์ ลูกค้าที่สั่งงานมาวันอาทิตย์ ของจะจัดส่งถึงปลายทางในวันอังคาร
                     </li>
                     <li>
                       สงวนสิทธิ์ในการเปลี่ยนแปลงเงื่อนไขโดยไม่ต้องแจ้งให้ทราบล่วงหน้า
                     </li>
                  </ui>
                  <br />
                  <h6 class="text-danger">* พื้นที่ที่ต้องใช้เวลาจัดส่งมากกว่า 1 วัน</h6>
                  <br />
                  <a class="banner-image text-center">
                  <img src="{{url('assets/image/kerry.jpg')}}" class="" style="width:60%; " alt=" Kerry Express"/>
                 </a>
                  <br />
                  <hr />
                  <br />

                  <h4 id="Kerry">บริการจัดส่ง EMS ไปรษณีย์ไทย</h4>
                  <br />
                  <a class="banner-image">
                  <img src="{{url('assets/image/ems.jpg')}}"  alt=" ems"/>
                  </a>
                  <br />
                  <h5>ค่าจัดส่งใช้ราคาเดียวกันทั่วประเทศ</h5>
                  <p>
                    ทางร้านจะคิดค่าจัดส่งEMSตามน้ำหนักที่ทางไปรษณีย์คิดบวกค่าวัสดุห่อตามขนาดและน้ำหนักของรูปที่สั่งอัด
                    รายละเอียดตามตารางข้างล่าง
                  </p>
                  <br />
                  <a class="banner-image text-center">
                  <img src="{{url('assets/image/ems_price.jpg')}}" class="" style="width:70%; " alt=" Kerry Express"/>
                </a>


              <br />
              <p class="text-center"> <strong> ติดต่อได้ที่เบอร์โทร 0639911075, fulryumail@gmail.com ทุกวัน เวลา 8.00-22.00น.</strong></p>


                  </div>


                </div>


	            </div>
	        </div>
	    </div>
	    <!-- Blog Section End -->



@endsection

@section('scripts')



@stop('scripts')
