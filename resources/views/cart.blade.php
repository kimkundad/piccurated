@extends('layouts.template')

@section('title')
Cart | Fulryu ความรู้สึกที่สัมผัสได้แต่ไม่สามารถมองเห็น
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
.buttons {
  background: #252531 none repeat scroll 0 0;
  border: 0 none;
  color: #ffffff;
  cursor: pointer;
  display: inline-block;
  font-size: 13.3px;
  font-weight: 600;
  letter-spacing: 0.2px;
  line-height: 39px;
  padding: 0 27px;
  text-transform: uppercase;
}
.buttons:hover {
  background: #bda87f;
  color: #ffffff;
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
                        <li class="breadcrumb-item active" aria-current="page">Cart</li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Breadcrumb Area End -->
        <!-- Cart Main Area Start -->
        <div class="cart-main-area ptb-80">
            <div class="container">

                    <div class="cart-table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="p-image"></th>
                                    <th class="p-name">Product Name</th>
                                    <th class="p-amount">Unit Price</th>
                                    <th class="p-quantity">Qty</th>
                                    <th class="p-total">SubTotal</th>
                                    <th class="p-edit">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              if(!Session::get('cart')){

                                $total = 0;
                                $total_item = 0;
                                $i = 1 ;

                              ?>

                              <?php
                                }else{
                                  $total = 0;
                                  $total_item = 0;
                                  $i = 1 ;
                                  $total_sum = 0;

                                  foreach(Session::get('cart') as $u){
                                    $total += $u['data'][2]['sum_price'];
                                    $total_sum = $u['data']['price']*$u['data'][1]['sum_item'];
                                    $total_item += $u['data'][1]['sum_item'];
                               ?>



                                <tr>

                                  <form id="myform-{{$u['data']['id']}}" name="myform-{{$u['data']['id']}}" action="{{ url('update_cart/') }}" method="POST" >
                                    {{ csrf_field() }}
                                    <td class="p-image">
                                        <a href="{{url('product/'.$u['data']['id'])}}"><img alt="" src="{{url('assets/image/product/'.$u['data']['image'])}}"></a>
                                    </td>
                                    <td class="p-name"><a href="{{url('product/'.$u['data']['id'])}}">{{$u['data']['name']}}</a></td>
                                    <td class="p-amount">฿{{$u['data']['price']}}.00</td>
                                    <td class="p-quantity"><input maxlength="12" type="text" value="{{$u['data'][1]['sum_item']}}" name="qty">
                                    <input type="hidden" value="{{$u['data']['id']}}" name="pro_id">
                                  </td>
                                    <td class="p-total"><span>฿{{$total_sum}}.00</span></td>
                                    <td class="edit">
                                      <a href="{{url('/')}}"><img src="{{url('home/assets/img/icon/delte.png')}}" style="margin-right:8px;" alt="Delete Item" title="Delete Item"></a>
                                      <a href="#" onclick="document.getElementById('myform-{{$u['data']['id']}}').submit(); return false;"><img src="{{url('home/assets/img/icon/32303.svg')}}" alt="Update Cart" style="height:20px;" title="Update Cart"></a>
                                    </td>
                                    </form>
                                </tr>

                                <?php
                                 $i++;
                                   }
                                  ?>

                                  <?php
                                     }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="all-cart-buttons">
                        <a class="buttons" href="{{url('/')}}"><span>Continue Shopping</span></a>
                        <a class="buttons" href="{{url('/clear_cart')}}"><span>CLEAR CART</span></a>

                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="ht-shipping-content">
                                <h3>RELATED PRODUCTS</h3>
                                <p>Base on your selection, you may be interested in the following items:</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="ht-shipping-content">
                                <h3>Discount Code</h3>
                                <p>Enter your coupon code if you have one</p>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="postal-code">
                                          <div class="writeinfo" style="    font-size: 16px;"></div>
                                            <input type="text" name="coupon" class="coupon" value="{{ old('coupon') }}" placeholder="">
                                            <input type="hidden" name="max_price" class="max_price" value="{{$total}}" placeholder="">
                                        </div>
                                        <div class="buttons-set">
                                            <button class="postbutton button" type="button"><span>Apply Coupon</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>






                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="ht-shipping-content">
                                <h3>Total</h3>
                                <div class="amount-totals">
                                    <p class="total">Discount <span>
                                      @if(Session::get('coupon') == null)
                                      ฿0.00
                                      @else
                                      ฿{{Session::get('coupon.price')}}
                                      @endif
                                    </span></p>
                                    <p class="total">Grandtotal <span>฿{{$total-Session::get('coupon.price')}}.00</span></p>
                                    <a class="buttons" href="{{url('/checkout')}}"><span>Procced to checkout</span></a>
                                    <div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
        <!-- Cart Main Area End -->



@endsection

@section('scripts')

<script>
        $(document).ready(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $(".postbutton").click(function(){
                $.ajax({
                    /* the route pointing to the post function */
                    url: '{{url('post_coupon')}}',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, coupon:$(".coupon").val(), max_price:$(".max_price").val()},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                        $(".writeinfo").append(data.msg);

                        if(data.status == 'success'){

                          setTimeout(function() {
                                 location.reload();
                          }, 2000);

                        }

                        setTimeout(function() {
                             $(".writeinfo").empty()
                        }, 3000);
                    }
                });
            });
       });
    </script>

@stop('scripts')
