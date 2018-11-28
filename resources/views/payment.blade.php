@extends('layouts.template')

@section('title')
Payment | Fulryu
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


@stop('stylesheet')
@section('content')


<!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-dark">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Payment</li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

        <!-- Checkout Area Start -->
        <div class="checkout-area pt-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-12 offset-md-1">
                        <div class="panel-group" id="headingTwo" role="tablist" aria-multiselectable="true">








                            <div class="panel">
                                <div class="panel-heading" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" >
                                          PAYMENT INFORMATION
                                        </a>
                                    </h4>
                                </div>



                                <div id="billing" class="collapse show">

                                  <div class="panel-body">

                                    <div class="checkout-buttons">
                                      <div class="table-responsive">

                                        <h4>บัตรเครดิต</h4>
                                        <p style="font-size:15px;"><b>ยินดีรับการชำระเงินผ่านบัตรเครดิตและบัตรเดบิต </b></p>

                                        <p>
                                          ทุกธุรกรรมผ่านบัตรเครดิตและบัตรเดบิตได้รับการรับรองความปลอดภัยด้วยเทคโนโลยี Paypal
                                          ที่ได้รับการรับรองแล้ว คุณจะได้รับการยืนยันและตั๋วอิเล็กทรอนิกส์ผ่านทางอีเมล์ภายใน 10 นาที ภายหลังจากที่ชำระเงินเสร็จสิ้น
                                        </p>
                                        <form class="w3-container w3-display-middle w3-card-4 " method="POST" id="payment-form"  action="{{url('paypal')}}">
                                            {{ csrf_field() }}

                                            <p>
                                            <label class="w3-text-blue"><b>จำนวนเงินที่ท่านต้องชำระคือ</b></label>
                                            <input class="w3-input w3-border" name="amount" value="{{$order->total_money}}" type="text"></p>
                                            <input class="hidden" name="id_order" value="{{$id_order}}" type="hidden">
                                            <button class="default-btn" style="color:#fff">Pay with PayPal</button></p>
                                          </form>
                                        <br />
                                        <img src="{{url('assets/image/logo-master-card2.png')}}" height="29">
                                        <img src="{{url('assets/image/paypal_bt.png')}}" height="29">
                                        <br />
                                        <br />
                                        <br />

                                        <h4>ชำระผ่านบัญชีธนาคาร</h4>
                                        <p style="font-size:15px;"><b>สามารถแจ้งชำระผ่านบัญชีธนาคาร ตามหมายเลขที่ระบุไว้ จากนั้นแจ้งการชำระเงินที่ <a href="{{url('confirm_payment')}}" target="_blank">แจ้งชำระเงิน</a></b></p>

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
                                    <h5>ORDER NO. {{$id_order}}</h5>
                                    <hr />
                                            <div class="checkout-table table-responsive">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th class="p-name alignleft">Product Name</th>
                                                            <th class="p-amount">Price</th>
                                                            <th class="p-quantity">Qty</th>
                                                            <th class="p-total">SubTotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      @foreach($order_all as $u)
                                                        <tr>
                                                            <td class="p-name">{{$u->product_name}}</td>
                                                            <td class="p-amount"><span class="amount">฿{{$u->options->pro_price}}</span></td>
                                                            <td class="p-quantity">{{$u->sum_item}}</td>
                                                            <td class="p-total alignright">฿{{$u->sum_money}}</td>
                                                        </tr>
                                                      @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="3" class="alignright">Subtotal</td>
                                                            <td>฿{{$order->total_money-$order->shipping_price}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="alignright">Shipping &amp; Handling (Flat Rate - Fixed)    </td>
                                                            <td>฿{{$order->shipping_price}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="alignright">Discount    </td>
                                                            <td>฿{{$order->discount}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="alignright"><strong>Grand Total</strong></td>
                                                            <td><strong>฿{{$order->total_money}}</strong></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                <div class="checkout-buttons">
                                                    <p>Forgot an Item? <a href="#">Edit Your Cart</a>
</p>
                                                    <a href="#" class="default-btn" style="color:#fff"><span>Print Order</span></a>
                                                </div>


                                            </div>

                                    </div>

                                </div>





                            </div>

















                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Checkout Area End -->



@endsection

@section('scripts')

@stop('scripts')
