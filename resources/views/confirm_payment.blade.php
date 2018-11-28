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
                                            แจ้งชำระเงิน
                                        </a>
                                    </h4>
                                </div>


                                <div id="checkout" class="collapse show">
                                    <div class="panel-body">

                                      <h3 class="login-title">ต้องกรอกข้อมูลให้ครบและถูกต้อง</h3>

                                      <p> ท่านสามารถทำรายการโอนเงินผ่าน Internet Banking, เคาท์เตอร์ธนาคาร, CDM หรือ ATM โดยระบุเลขที่บัญชี และ จำนวนเงินที่ต้องการโอนให้ถูกต้อง โดยปฏิบัติตามขั้นตอน / คำแนะนำของแต่ละธนาคาร!</p>
                                      <div class="login-form">
                                          <form action="{{url('confirm_payment_update')}}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}

                                              <div class="customer-name">
                                                <div class="first-name">
                                                <p>ชื่อ-สกุล*</p>
                                                <input type="text" name="name" value="{{old('name')}}" required="">
                                                </div>
                                                <div class="last-name">
                                                  <p>เบอร์ติดต่อ*</p>
                                                  <input type="text" name="phone" value="{{old('phone')}}" >
                                                </div>
                                              </div>


                                              <div class="customer-name">
                                                <div class="first-name">
                                                <p>หมายเลขสั่งซื้อ*</p>
                                                <input type="number" name="order_id" value="{{old('order_id')}}" placeholder="หมายเลขสั่งซื้อ จะแจ้งไปยังอีเมล." required="">
                                                </div>
                                                <div class="last-name">
                                                  <p>email*</p>
                                                  <input type="email" name="email" value="{{old('email')}}" >
                                                </div>
                                                <div class="last-name">
                                                  <p>ยอดโอน*</p>
                                                  <input type="number" name="money" value="{{old('money')}}" >
                                                </div>
                                              </div>
                                              <hr />
                                              <div class="ship-wrap">
                                                  <p>ธนาคารที่โอน*</p>

                                                  @if($bank)
                                                  @foreach($bank as $u)
                                                    <div class="ship-address">
                                                        <label>
                                                            <input type="radio" name="bank" value="{{$u->id}}" >
                                                            <img src="{{url('assets/images/bank/'.$u->bank_img)}}" height="35"> {{$u->name_b}} {{$u->name_no_b}} {{$u->major_name_b}}
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                    @endif

                                                </div>


                                                <div class="customer-name">
                                                  <div class="first-name">
                                                  <p>วันที่โอน*</p>
                                                  <input type="text" name="date_transfer" placeholder="__/__/____" value="{{old('date_transfer')}}" >
                                                  </div>
                                                  <div class="last-name">
                                                    <p>เวลา*</p>
                                                    <input type="text" name="time_transfer" value="{{old('time_transfer')}}" >
                                                  </div>
                                                </div>

                                                <p>ไฟล์แนบ (อนุญาตให้อัพโหลดเฉพาะ: .jpg, .gif, .jpeg, .png, .pdf)</p>
                                                <input type="file" name="slip_image" value="{{old('slip_image')}}">

                                              <p>หมายเหตุ*</p>
                                              <textarea name="note" rows="4" placeholder="Type Your Message......." required="">{{old('note')}}</textarea>

                                              <br />
                                              <br />
                                              <div class="form-row text-center">
                                                <div class="col-12">
                                                  <button type="submit" class="default-btn">แจ้งชำระเงิน</button>
                                                </div>
                                              </div>
                                          </form>
                                      </div>
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
