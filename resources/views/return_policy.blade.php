@extends('layouts.template')

@section('title')
Return Policy | Fulryu
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
                        <li class="breadcrumb-item active" aria-current="page">นโยบายการคืนสินค้า</li>
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
                  <h3>Return Policy</h3>
                  <p style="font-size:14px;"><b>เกี่ยวกับนโยบายการคืนสินค้าของเรา </b></p>
                  <p>
                    เป้าหมายหลักของคือการสร้างความพึงพอใจให้กับลูกค้า ดังนั้นทางจึงขอมอบความเป็นไปได้ในการคืนสินค้าใดๆก็ตามที่ชำรุดหรือยังไม่ได้เปิดใช้งานภายในระยะเวลา 14
                    วันนับจากวันที่ท่านได้รับสินค้า (โดยถือตามอากรแสตมป์ที่ติดอยู่บนบรรจุภัณฑ์ของตัวสินค้าเป็นหลัก) และ 15 วันสำหรับสินค้า
                     สินค้าที่จะทำการส่งคืนจะต้องอยู่ในสภาพเดิมเหมือนกับตอนที่ท่านได้รับสินค้า หากท่านต้องการทราบรายละเอียดเกี่ยวกับเหตุผลและเงื่อนไขการคืน

                  </p>
                  <p>
                    ทางเราจะตอบรับการคืนสินค้าด้วยเหตุผล 4 ข้อดังต่อไปนี้ คือ:
                  </p>

                  <a class="banner-image text-center">
                  <img src="{{url('assets/image/return.jpg')}}" class="" style="width:85%; " alt=" Return Policy"/>
                </a>
                <br />
                <p>
                  ระยะเวลาในการจัดส่งสินค้าไปที่คลังสินค้าของเราใช้เวลาโดยประมาณ 8 วันทำการ หลังจากที่ได้รับสินค้าแล้ว กระบวนการตรวจสอบสินค้าใช้เวลาโดยประมาณ 3-5 วันทำการ (หากสินค้าที่มีรายละเอียดซับซ้อน อาจมีระยะเวลาในการตรวจสอบเกิน 5 วันทำการ)
                </p>





                </div>


	            </div>
	        </div>
	    </div>
	    <!-- Blog Section End -->



@endsection

@section('scripts')



@stop('scripts')
