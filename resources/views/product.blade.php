@extends('layouts.template')

@section('title')
{{$objs->pro_name}} | Piccurated
@stop

@section('description')
{{str_limit($objs->pro_title, 150, '..')}}
@stop

@section('og_tag')
<meta property="og:url"           content="https://piccurated.com/product/{{$objs->id_p}}" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="{{$objs->pro_name}}" />
<meta property="og:image"         content="{{url('assets/image/product/'.$objs->pro_image)}}" />
<meta property="og:description"   content="{{str_limit($objs->pro_title, 150, '..')}}" />
<meta property="og:image:width" content="600" />
<meta property="og:image:height" content="314" />
<meta property="fb:app_id" content="355004925273070">
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
.p-image {
    padding: 0 0px 0px;
    width: 24%;
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
.add-to-cart{
  background: #bda87f none repeat scroll 0 0;
    border-radius: 29px;
    color: #ffffff;
    font-size: 14px;
    line-height: 40px;
    margin-left: 15px;
    padding: 0 41px;
    text-transform: uppercase;
}


/*  */

.numbers-row {
    position: relative;
    width: 97px;
    height: 40px;
    overflow: visible;
}
input.qty2 {
    position: relative;
    width: 35px;
    height: 40px;
    border-radius: none;
    text-align: center;
    left: 31px;
    font-size: 12px;
    padding: 5px;
}
.button_inc {
    text-indent: -9999px;
    cursor: pointer;
    position: absolute;
    width: 33px;
    height: 40px;
    z-index: 9;
}
.inc {
    background: #fff url({{url('assets/image/plus.png')}}) no-repeat center center;
    right: 0;
    top: 0;
    border: 1px solid #ccc;
    -webkit-border-top-right-radius: 4px;
    -webkit-border-bottom-right-radius: 4px;
    -moz-border-radius-topright: 4px;
    -moz-border-radius-bottomright: 4px;
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
}
.dec {
    background: #fff url({{url('assets/image/minus.png')}}) no-repeat center center;
    border: 1px solid #ccc;
    left: 0;
    top: 0;
    -webkit-border-top-left-radius: 4px;
    -webkit-border-bottom-left-radius: 4px;
    -moz-border-radius-topleft: 4px;
    -moz-border-radius-bottomleft: 4px;
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
}
.f1-buttons {
    text-align: center;
}
/*  */

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

                      <img src="{{url('assets/image/gallery/'.$img_all[0]->image)}}" name="image1" id="image1" ><br><br>
                      <div class="row">
                        @for ($x = 0; $x < $img_count; $x++)
                            <img src="{{url('assets/image/gallery/'.$img_all[$x]->image)}}" onclick="changeImage('{{url('assets/image/gallery/'.$img_all[$x]->image)}}','image1'); images1num = 0;" class="col-md-3"
                            style="padding: 5px; height:100%"
                            name="image1" id="image1" >
                        @endfor
                      </div>

                      <!--
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
                      -->


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
                            <form action="{{url('add_cart/')}}" id="my_form" method="POST" class="f1">
                            <div class="qty-cart-add">


                                  {{ csrf_field() }}

                                  <div class="numbers-row">

                                  <input type="text" value="1" id="quantity_" class="qty2 form-control" placeholder="1" name="qty">
                                  </div>

                                  <input type="hidden" name="pro_id" value="{{$objs->id_p}}" >
                                  <input type="hidden" name="check_option" value="{{$check_option}}" >




                                  <div style="padding-left:10px;" class="fb-share-button" data-href="https://piccurated.com/product/{{$objs->id_p}}" data-layout="box_count" data-size="small" data-mobile-iframe="true">
                                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fpiccurated.com%2Fproduct%2F{{$objs->id_p}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">แชร์</a>
                                  </div>

                                  @if($objs->id_main == 1)
                                  @else
                                  <a href="javascript:$('#my_form').submit();"  class="btn add-to-cart">Add to cart</a>
                                  @endif


                            </div>





                            @if($objs->id_main == 1)

                            <hr />

                            <div class="row">



                              <div id="step1" style="font-size: 14px; width: 100%; font-weight: 600;">

                                   </div>

                                   <div id="step2" style="font-size: 14px; width: 100%; font-weight: 600;">

                                   </div>

                                   <div id="step3" style="font-size: 14px; width: 100%; font-weight: 600;">

                                   </div>

                                   <div id="step4" style="font-size: 14px; width: 100%; font-weight: 600;">

                                   </div>






                          <div class="f1-steps">
                              <div class="f1-progress">
                                  <div class="f1-progress-line" data-now-value="13.66" data-number-of-steps="4" style="width: 13.66%;"></div>
                              </div>
                              <div class="f1-step active">
                                <div class="f1-step-icon">1</div>
                                <p>ขนาดรูป</p>
                              </div>
                              <div class="f1-step">
                                <div class="f1-step-icon">2</div>
                                <p>ชนิดกระดาษ</p>
                              </div>
                                <div class="f1-step">
                                <div class="f1-step-icon">3</div>
                                <p>เลือกกรอบรูป</p>
                              </div>

                              <div class="f1-step">
                              <div class="f1-step-icon">4</div>
                              <p>สีกรอบรูป</p>
                            </div>
                          </div <?php $i = 1; ?>>




                         <fieldset style="width: 100%;" <?php $z = 0; ?>>
                           <br  />


                           @foreach($my_option[0]->options as $j)
                           <label style="width: 100%; display: inline-flex; margin-bottom: 10px;" data-slick-index="0" tabindex="-1">

                             <input type="radio" name="{{$my_option[0]->option_title}}" value="{{$j->id}}" data-name="{{$j->item_name}}"  class="get_var_option{{$my_option[0]->id_op}}" data-value="{{$j->id}}"
                             @if($img_count == 1)

                             @if($z <= 0)
                             onclick="changeImage('{{url('assets/image/gallery/'.$img_all[$z]->image)}}','image1'); images1num = 0;"
                             @endif

                             @elseif($img_count == 2)

                             @if($z <= 1)
                             onclick="changeImage('{{url('assets/image/gallery/'.$img_all[$z]->image)}}','image1'); images1num = 0;"
                             @endif

                             @elseif($img_count == 3)

                             @if($z <= 2)
                             onclick="changeImage('{{url('assets/image/gallery/'.$img_all[$z]->image)}}','image1'); images1num = 0;"
                             @endif

                             @else

                             @if($z <= 3)
                             onclick="changeImage('{{url('assets/image/gallery/'.$img_all[$z]->image)}}','image1'); images1num = 0;"
                             @endif

                             @endif




                              style="width: 30px; text-align: left; height: 18px;">

                             <span style="font-size:13px"> {{$j->item_name}}</span>
                           </label {{$z++}}>
                           @endforeach
<br /><br />
                            <div class="f1-buttons">

                              <button type="button" class="btn btn-next">ต่อไป</button>

                            </div>
                            <br />
                        </fieldset {{$i++}}>



                        <fieldset style="width: 100%;" >
                          <br />

                          @foreach($my_option[1]->options  as $j)
                          <label style="width: 100%; display: inline-flex; margin-bottom: 10px;" data-slick-index="0" tabindex="-1">
                            <input type="radio" name="{{$my_option[1]->option_title}}" value="{{$j->id}}" data-name="{{$j->item_name}}"  class="get_var_option{{$my_option[1]->id_op}}" data-value="{{$j->id}}" style="width: 30px; text-align: left; height: 18px;">
                            <span style="font-size:13px"> {{$j->item_name}}</span>
                          </label>
                          @endforeach
                          <br />
                           <div class="f1-buttons">
                               <button type="button" class="btn btn-previous">กลับ</button>
                               <button type="button" class="btn btn-next">ต่อไป</button>

                           </div>
                           <br />
                       </fieldset >


                       <fieldset style="width: 100%;" >
                         <br />

                         @foreach($my_option[2]->options  as $j)
                         <label style="width: 100%; display: inline-flex; margin-bottom: 10px;" data-slick-index="0" tabindex="-1">
                           <input type="radio" name="{{$my_option[2]->option_title}}" value="{{$j->id}}" data-name="{{$j->item_name}}"  class="get_var_option{{$my_option[2]->id_op}}" data-value="{{$j->id}}" style="width: 30px; text-align: left; height: 18px;">
                           <span style="font-size:13px"> {{$j->item_name}}</span>
                         </label>
                         @endforeach
<br />
                          <div class="f1-buttons">
                              <button type="button" class="btn btn-previous">กลับ</button>
                              <button type="button" class="btn btn-next next_step3">ต่อไป</button>

                          </div>
                          <br />
                      </fieldset >



                      <fieldset style="width: 100%;" >
                        <br />

                        <div id="final">
                          @foreach($my_option[3]->options  as $j)
                          <label style="width: 100%; display: inline-flex; margin-bottom: 10px;" data-slick-index="0" tabindex="-1">
                            <input type="radio" name="{{$my_option[3]->option_title}}" value="{{$j->id}}" data-name="{{$j->item_name}}"  class="get_var_option{{$my_option[3]->id_op}}" data-value="{{$j->id}}" style="width: 30px; text-align: left; height: 18px;">
                            <span style="font-size:13px"> {{$j->item_name}}</span>
                          </label>
                          @endforeach
                        </div>

<br />
                         <div class="f1-buttons">
                             <button type="button" class="btn btn-previous">กลับ</button>
                             <a href="javascript:$('#my_form').submit();" id="final-btn" class="btn add-to-cart">Add to cart</a>
                         </div>
                         <br />
                     </fieldset >



                            </div>
                            @else

                            @endif



                            </form>






                            <div class="p-d-buttons">
                                <a >รายละเอียดสินค้า</a>



                            </div>



                            <p>

                              {!! $objs->pro_title !!}
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

                                    {!! $objs->pro_name_detail !!}

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

                              <div class="fb-comments" data-href="https://piccurated.com/product/{{$objs->id_p}}" data-width="100%" data-numposts="10"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <style>
        .img_container {
      position: relative;
      max-height: 180px;
      }
        .img_container img {
      -webkit-transform: scale(1.2);
      transform: scale(1.2);
      -webkit-transition: all .5s ease;
      transition: all .5s ease;
      -webkit-backface-visibility: hidden;
      }
      </style>
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


                                    <div class="img_container" style="min-height:180px; overflow: hidden;">

                                      <a href="{{url('product/'.$u->id_p)}}">
                                          <img class="primary-image" src="{{url('assets/image/product/'.$u->pro_image)}}" alt="{{$u->pro_title}}">

                                      </a>

                                    </div>

                                </div>
                                <div class="product-text">
                                  <div class="product-rating">
                                     <?php
                                     for($i=1;$i <= $u->pro_rating;$i++){
                                     ?>
                                      <i class="fa fa-star color"></i>
                                     <?php
                                     }

                                     $total = 5;
                                     $total -= $u->pro_rating;

                                     for($i=1;$i <= $total;$i++){
                                     ?>
                                     <i class="fa fa-star"></i>
                                     <?php
                                     }
                                     ?>

                                  </div>
                                    <h4><a href="{{url('product/'.$u->id_p)}}">{{$u->pro_title}}</a></h4>
                                    <div class="product-price"><span>${{number_format((float)$u->pro_price , 2, '.', '')}}</span></div>
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
  js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v3.2&appId=355004925273070&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<script>





</script>
<script src="{{url('assets/js/jquery.backstretch.js')}}"></script>
<script src="{{url('assets/js/scripts.js')}}"></script>
<script type="text/javascript">

var step1_1 = 0;
var step2_2 = 0;
var step3_3 = 0;
var step4_4 = 0;


$('#final-btn').hide();

$('input[name=size]').click(function(){
  document.getElementById('step1').innerHTML = "ขนาดรูป : "+$(this).data("name");
  step1_1 = $(this).data("name");
  console.log(step1_1);
 });

 $('input[name=paper]').click(function(){
   document.getElementById('step2').innerHTML = "ชนิดกระดาษ : "+$(this).data("name");
   step2_2 = $(this).data("name");

   if(step2_2 == 'canvas'){
     $("#final").hide();
   }
   console.log(step2_2);
  });

  $('input[name=frame]').click(function(){
    document.getElementById('step3').innerHTML = "เลือกกรอบรูป : "+$(this).data("name");
    step3_3 = $(this).val();
    console.log(step3_3);
  //  console.log(step1_1);
    if(step1_1 != 0 && step3_3 != 0){
      $("#final-btn").show();
    }
    if(step3_3 == 11){
      $("#final").hide();
    }else{

      if(step2_2 == 'canvas' && step3_3 == 10){
        $("#final").hide();
      }else{
        $("#final").show();
      }

    }


   });

   $('.next_step3').click(function(){

     if(step2_2 == 'canvas' && step3_3 == 10 || step2_2 == 'canvas' && step3_3 == 11){
       $("#final").hide();
     }

     if(step3_3 == null){
       $("#final").hide();
     }

     if(step2_2 == 'Paper' && step3_3 == 10){
       $("#final").show();
     }

     });



   $('input[name=frame_color]').click(function(){
     document.getElementById('step4').innerHTML = "สีกรอบรูป : "+$(this).data("name");
     step4_4 = +$(this).data("name");
     console.log(step4_4);
    });





//final-btn

    function changeImage(imgName, name)
     {
        image = document.getElementById(name);
        image.src = imgName;
     }

   var images1 = ["http://placehold.it/100x100","http://placehold.it/200x200","http://placehold.it/300x300"];
   var images1num = 0;

   function changeImageClick(num)
   {
           if(num == 1)
           {
               images1num = (images1num + 1) % images1.length;
               changeImage(images1[images1num],'image1');

               var input = document.getElementsByTagName('input');
               var nextInput = false;

               for(var i = 0; i < input.length; i++)
               {
                   if(input[i].checked == true && input[i].name == 'image1')
                   {
                       nextInput = true;

                        if(nextInput)
                       {
                           input[(i+1)%images1.length].click();
                           nextInput = false;
                           break;
                       }
                   }
               }
           }
   }


   $(".numbers-row").append('<div class="inc button_inc">+</div><div class="dec button_inc">-</div>');
       $(".button_inc").on("click", function () {

           var $button = $(this);
           var oldValue = $button.parent().find("input").val();

           if ($button.text() == "+") {
               var newVal = parseFloat(oldValue) + 1;
           } else {
               // Don't allow decrementing below zero
               if (oldValue > 1) {
                   var newVal = parseFloat(oldValue) - 1;
               } else {
                   newVal = 1;
               }
           }
           $button.parent().find("input").val(newVal);
       });

</script>

@stop('scripts')
