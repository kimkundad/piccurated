@extends('layouts.template')

@section('title')
{{$objs->pro_name}} | Fulryu
@stop

@section('description')
{{str_limit($objs->pro_title, 150, '..')}}
@stop

@section('og_tag')
<meta property="og:url"           content="https://fulryu.com/product/{{$objs->id_p}}" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="{{$objs->pro_name}}" />
<meta property="og:image"         content="{{url('assets/image/product/'.$objs->pro_image)}}" />
<meta property="og:description"   content="{{str_limit($objs->pro_title, 150, '..')}}" />
<meta property="og:image:width" content="600" />
<meta property="og:image:height" content="314" />
<meta property="fb:app_id" content="1916660355081132">
<meta property="fb:admins" content="100002037238809">
@stop

@section('stylesheet')

<link rel="stylesheet" href="{{url('home/assets/css/slick.css')}}">
<style>

.qty-cart-add > form > input {
    border: 1px solid #c2c2c2;
    border-radius: 20px;
    color: #444444;
    font-size: 14px;
    height: 100%;
    padding: 0 10px;
    text-align: center;
    width: 52px;
}
.qty-cart-add > form > a:hover {
    background: #444444 none repeat scroll 0 0;
}
.qty-cart-add > form > a {
    background: #bda87f none repeat scroll 0 0;
    border-radius: 29px;
    color: #ffffff;
    font-size: 14px;
    line-height: 40px;
    margin-left: 15px;
        padding: 10px 41px;
    text-transform: uppercase;
}
.qty-cart-add > form > label {
    -ms-flex-item-align: center;
    align-self: center;
    color: #444444;
    font-size: 13px;
    font-weight: 700;
    margin: 0 13px 0 0;
    text-transform: capitalize;
}
.tour_title{
 background: #979799; padding: 8px 10px 8px 10px; color: #fff;
 position: relative;
 font-weight: 300;
}
.text_title{
  color: #fff; font-size:13px;
  font-weight: 100;
  text-align: left;
}
.price_product {
    position: absolute;
    top: 0px;
    right: 10px;
    width: 40px;
    height: 40px;
    font-size: 20px;
    line-height: 40px;
    font-weight: 100;
}
.tour_title h3 {
    text-align: left;
    font-size: 16px;
    margin-top: 5px;
    color: #fff;
    text-transform: uppercase;
   font-weight: 100;
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
                        <li class="breadcrumb-item active" aria-current="page">{{$objs->pro_name}}</li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Breadcrumb Area End -->
        <!-- Product Details Area Start -->
        <div class="product-details-area pt-80 pb-75">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <div class="single-product-image product-image-slider fix">
                          @if($img_all)
                          @foreach($img_all as $img_u)
                            <div class="p-image"><img src="{{url('assets/image/gallery/'.$img_u->image)}}" alt=""></div>
                          @endforeach
                          @endif


                        </div>
                        <div class="single-product-thumbnail product-thumbnail-slider float-left" id="gallery_01">

                          @if($img_all)
                          @foreach($img_all as $img_u)
                            <div class="p-thumb"><img src="{{url('assets/image/gallery/'.$img_u->image)}}" alt=""></div>
                          @endforeach
                          @endif


                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <div class="p-d-wrapper">
                            <h1>{{$objs->pro_name}}</h1>
                            <div class="p-rating-review">
                                <div class="product-rating">
                                  <?php
                                  for($i=1;$i <= $objs->pro_rating;$i++){
                                  ?>
                                  <i class="fa fa-star color"></i>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  $total = 5;
                                  $total -= $objs->pro_rating;

                                  for($i=1;$i <= $total;$i++){
                                  ?>
                                  <i class="fa fa-star"></i>
                                  <?php
                                  }
                                  ?>
                                </div>
                                <span>1 review</span>
                                <a href="#" class="scroll-down">Add your review</a>
                            </div>
                            <span class="p-d-price">฿{{number_format($objs->pro_price)}}.00</span>
                            <span class="model-stock">In stock : {{$objs->total_product}} pcs , <span><span>รหัสสินค้า</span>{{$objs->pro_code}}</span></span>
                            <form action="{{url('add_cart/')}}" id="my_form" method="POST">
                            <div class="qty-cart-add">


                                  {{ csrf_field() }}
                                  <label for="qty">qty</label>
                                  <input type="text" name="qty" value="1" placeholder="1" >
                                  <input type="hidden" name="pro_id" value="{{$objs->id_p}}" >

                                  <a href="javascript:$('#my_form').submit();" id="subtip_to" style="display:none">Add to cart</a>
                                  <a  id="subtip_weit" data-toggle="modal" data-target="#exampleModalCenter" style="display:none">Add to cart</a>


                            </div>

                            @if($get_option != null)
                            @foreach($get_option as $k)
                            <div >
                              <p class="model-stock">
                                {{$k->head_label}}
                              </p>

                              @foreach($k->get_option_product as $j)

                              <label style="width: 100%; display: inline-flex; margin-bottom: 10px;">
                                <input type="radio" name="{{$k->head_var}}" value="{{$j->id}}" class="get_var_option" data-value="{{$j->id}}" style="width: 30px; text-align: left; height: 18px;">
                                <span style="font-size:13px"> {{$j->item_name}}</span>
                              </label>
                              @endforeach

                            </div>
                            @endforeach
                            @endif
                            </form>



                            <!-- Modal -->
                          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">แจ้งเตือน</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  กรุณาเลือก สี, ขนาด ของสินค้าที่มีอยู่ด้วยค่ะ
                                </div>

                              </div>
                            </div>
                          </div>

                            <div class="p-d-buttons">
                                <a >รายละเอียดสินค้า</a>



                            </div>



                            <p>
                              {{$objs->pro_title}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container scroll-area">
                <div class="p-d-tab-container">
                    <div class="p-tab-btn">
                        <div class="nav" role="tablist">
                            <a class="active" href="#tab1" data-toggle="tab" role="tab" aria-selected="true" aria-controls="tab1">รายละเอียดเพิ่มเติม</a>
                            <a href="#tab2" data-toggle="tab" role="tab" aria-selected="false" aria-controls="tab2">รีวิวของ {{$objs->pro_name}} </a>
                        </div>
                    </div>
                    <div class="p-d-tab tab-content">
                        <div class="tab-pane active show fade" id="tab1" role="tabpanel">
                            <div class="tab-items">
                                <div class="p-details-list">
                                    {{$objs->pro_name_detail}}
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade scroll-area" id="tab2" role="tabpanel">
                            <div class="tab-items">
                              <style>
                              .fb_iframe_widget_fluid_desktop iframe {
                                    min-width: 100% !important;
                                    position: relative;
                                }
                              </style>

                              <div class="fb-comments" data-href="https://fulryu.com/product/{{$objs->id_p}}" data-width="100%" data-numposts="10"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Details Area End -->
        <!-- Related Products Area Start -->
        <div class="related-products-area text-center">
            <div class="container">
                <div class="section-title title-style-2">
                    <h2><span>Related Products</span></h2>
                </div>
            </div>
            <div class="container">
                <div class="custom-row">
                    <div class="related-product-carousel owl-carousel carousel-style-one">


                      @if($related)
                        @foreach($related as $u)

                        <div class="custom-col">
  	                        <div class="product-item">

                                  <div class="product-image-hover">
                                      <a href="{{url('product/'.$u->id_p)}}">
                                          <img class="primary-image" src="{{url('assets/image/product/'.$u->pro_image)}}" alt="">
                                          <div class="tour_title" >
                                            <h3> {{str_limit($u->pro_name, 38, '..')}}</h3>
                                            <div class="price_product">
                                              {{$u->pro_price}}
                                            </div>
                                              <p class="text_title" style="font-family: 'Prompt script=all rev=3', 'Adobe Blank'; font-weight: 100; font-style: normal; margin-top:10px;margin-bottom: 0rem;" >
                                                {{str_limit($u->pro_title, 150, '..')}}
                                              </p>
                                         </div>
                                      </a>

                                  </div>

  	                        </div>
  	                    </div>

                        @endforeach
               @endif







                    </div>
                </div>
            </div>
        </div>
        <!-- Related Products Area End -->
        <br /><br />


@endsection

@section('scripts')

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v3.1&appId=203219603796007&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<script>

$(document).ready(function () {

  var val_op = {{$check_option}};

  if(val_op == 1){
        var x = document.getElementById("subtip_to");
        x.style.display = "none";
        var y = document.getElementById("subtip_weit");
        y.style.display = "block";
      }else{
        var x = document.getElementById("subtip_to");
        x.style.display = "block";
        var y = document.getElementById("subtip_weit");
        y.style.display = "none";
      }


$(".get_var_option").change(function () {

   val_op = $('.get_var_option:checked').val();
   if(val_op != 0){
         var x = document.getElementById("subtip_to");
         x.style.display = "block";
         var y = document.getElementById("subtip_weit");
         y.style.display = "none";
       }
  //  alert(val);
  console.log(val_op);
});

console.log(val_op);

});



</script>

@stop('scripts')
