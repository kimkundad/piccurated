@extends('layouts.template')

@section('title')
Fulryu ความรู้สึกที่สัมผัสได้แต่ไม่สามารถมองเห็น
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
.slider-two-area .banner-btn, .slider-three-area .banner-btn {

    margin-top: 39px;

}
.product-widget-title > h4 {
    color: #252531;
    font-size: 20px!important;
    font-weight: 500;
}
.product-widget-title {
    margin-bottom: 20px;
}
.product-widget-item {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    padding: 0px 0 18px;
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


<!-- Slider Two Area Start -->
	    <div class="slider-two-area">
	        <div class="slider-wrapper owl-carousel carousel-style-dot">
            @if($slide)
              @foreach($slide as $slider)
	            <div class="single-slide" style="background-image: url('{{url('assets/image/slide/'.$slider->image_slide)}}');">
                    <div class="slider-banner">
                        <h1>{{$slider->text_slide1}}</h1>
                        <h2>{{$slider->text_slide2}}</h2>
                        <p>{{$slider->text_slide3}}</p>
                        <a href="{{$slider->btn_url}}" class="banner-btn">{{$slider->btn_slide}}</a>
                    </div>
                </div>
                @endforeach
	            @endif
	        </div>
	    </div>
	    <!-- Slider Two Area End    -->



      <?php
      $s = 1;
       ?>
	    <!-- Banner Area Start -->

      <div class="banner-area mt-30 style-1">
	        <div class="custom-container">
	            <div class="row">
                @if($blog_new)
                  @foreach($blog_new as $u)
	                <div class="col-lg-4 col-md-6">
                        <a class="banner-image
                        @if($s > 3)
                        blog-pad
                        @endif
                        " href="{{url('blog/'.$u->id)}}">
                          <img src="{{url('assets/image/blog/'.$u->blog_img)}}" alt="">
                          <div class="tour_title" >
							                 <p class="text_title" style="margin-bottom: 0rem;">{{str_limit($u->blog_title, 60, '..')}} </p>
						              </div>
                        </a>
	                </div {{$s++}}>
                  @endforeach
  	            @endif
	        </div>
	    </div>


	 <!--    -->
	    <!-- Banner Area End -->












     <!-- Product Area Start -->
    <div class="product-area text-center pt-50 ">
        <div class="container">
            <div class="section-title">

                <h2><span style="font-weight: 500;">RECOMMENDED ITEMS</span></h2>
            </div>
        </div>
        <div class="container">
            <div class="custom-row">
                <div class="product-carousel-two owl-carousel carousel-style-one">


             @if($objs_rec)
               @foreach($objs_rec as $u)
                    <div class="custom-col">
                        <div class="product-item">
                           <!-- <span class="hot-sale black">sale</span> -->
                               <div class="product-image-hover">
                                   <a class="banner-image" href="{{url('product/'.$u->id_p)}}">
                                       <img class="primary-image" src="{{url('assets/image/product/'.$u->pro_image)}}" alt="">
                                       <div class="tour_title" >
             							                 <p class="text_title" style="margin-bottom: 0rem;">{{str_limit($u->pro_name, 38, '..')}}</p>
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
    <!-- Product Area End -->



    <!-- Banner Area Start -->
    <div class="product-area text-center pt-50 ">
    <div class="container">
        <div class="section-title">

            <h2><span style="font-weight: 500;">NEW ITEMS</span></h2>
        </div>
    </div>

    <div class="banner-area style-1 ">

        <div class="container">
            <div class="row">
              @if($objs_new)
                @foreach($objs_new as $u)
                <div class="col-lg-4 col-md-6">
                      <a class="banner-image" href="{{url('product/'.$u->id_p)}}">
                        <img src="{{url('assets/image/product/'.$u->pro_image)}}" alt="">
                        <div class="tour_title" >
                          <h3> {{str_limit($u->pro_name, 38, '..')}}</h3>
                          <div class="price_product">
                            {{$u->pro_price}}
                          </div>
                            <p class="text_title" style="font-family: 'Prompt script=all rev=3', 'Adobe Blank'; font-weight: 100; font-style: normal; margin-top:10px;margin-bottom: 0rem;" >
                              {{str_limit($u->pro_title, 260, '..')}}
                            </p>
                       </div>
                      </a>
                </div>
                @endforeach
       @endif

            </div>
        </div>
    </div>
    </div>


 <!--    -->
    <!-- Banner Area End -->






      <!-- Product Widget Area Start -->
	    <div class="product-widget-area pt-50 pb-50">
	        <div class="container">
	            <div class="row">


                @if($cat1)
                  @foreach($cat1 as $j)

	                <div class="col-lg-3 col-md-6">
	                    <div class="single-product-widget">
	                        <div class="product-widget-title">

	                            <h4><a href="{{url('category/'.$j->cat_id)}}">{{$j->name_cat}}</a></h4>
	                        </div>

													@if($j->options)
													@foreach($j->options as $u)
	                        <div class="product-widget-item">
	                            <div class="product-wid-img">
	                                <a href="{{url('product/'.$u->id)}}"><img src="{{url('assets/image/product/'.$u->pro_image)}}" style="height: 76px;" alt=""></a>
	                            </div>
                                <div class="product-text">
                                    <h4><a href="{{url('/')}}">{{$u->pro_name}}</a></h4>
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
                                    <div class="product-price"><span>฿{{$u->pro_price}}.00</span></div>
                                </div>
	                        </div>
													@endforeach
													@endif

	                    </div>
	                </div>
                  @endforeach
                @endif



	            </div>
	        </div>
	    </div>
	    <!-- Product Widget Area End -->

	    <!-- Information Area Start -->
	    <div class="information-area">
	        <div class="container">
	            <div class="information-wrapper ptb-60">
	                <div class="row">
	                    <div class="col-md-3">
	                        <div class="single-information">
	                            <div class="s-info-img"><img src="home/assets/img/icon/shipping.png" alt=""></div>
	                            <div class="s-info-text">
	                                <h4>free shipping</h4>
	                                <span>Free shipping on Order 400 baht</span>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-3">
	                        <div class="single-information">
	                            <div class="s-info-img"><img src="home/assets/img/icon/online.png" alt=""></div>
	                            <div class="s-info-text">
	                                <h4>Online Support 24/7</h4>
	                                <span>Support online 24 hours a day</span>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-3">
	                        <div class="single-information">
	                            <div class="s-info-img"><img src="home/assets/img/icon/money.png" alt=""></div>
	                            <div class="s-info-text">
	                                <h4>Money Return</h4>
	                                <span>Back guarantee under 7 days</span>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-3">
	                        <div class="single-information">
	                            <div class="s-info-img"><img src="home/assets/img/icon/member.png" alt=""></div>
	                            <div class="s-info-text">
	                                <h4>Member Discount</h4>
	                                <span>Onevery order over ฿120.00</span>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- Information Area End -->




@endsection

@section('scripts')

@stop('scripts')
