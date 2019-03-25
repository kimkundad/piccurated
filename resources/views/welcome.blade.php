@extends('layouts.template')

@section('title')
piccurated  is online natural printing, art gallery
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
<link rel="stylesheet" href="{{url('assets/slider-pro/css/slider-pro.min.css')}}">
<link rel="stylesheet" href="{{url('assets/fancybox/jquery.fancybox.css')}}">
<style>

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
	    <div class="slider-area">
	        <div class="slider-wrapper owl-carousel carousel-style-dot">
            @if($slide)
              @foreach($slide as $slider)
	            <div class="single-slide" style="background-image: url('{{url('assets/image/slide/'.$slider->image_slide)}}');">
                <div class="container">
                    <div class="slider-banner">
                        <h1 style="color:{{$slider->text_color}}">{{$slider->text_slide1}}</h1>
                        <h2 style="color:{{$slider->text_color}}">{{$slider->text_slide2}}</h2>
                        <p style="color:{{$slider->text_color}}">{{$slider->text_slide3}}</p>
                        <a href="{{$slider->btn_url}}" class="banner-btn">{{$slider->btn_slide}}</a>
                    </div>
                </div>
                </div>
                @endforeach
	            @endif
	        </div>
	    </div>
	    <!-- Slider Two Area End    -->

<style>
.top-left {
    font-size: 32px;
    position: absolute;
    bottom: 8px;
    left: 26px;
}
.text-0{
  color:#000;
}
.text-1{
  color:#fff;
}
.crop {
  width:400px; /*container-width*/

 overflow:hidden; /*hide bounds of image */

}

.crop img {
  margin:0 -38.885%;
   width:100%;

}

.thumb2 {

  width: 100%;
  height: 350px;
}
.thumb2 button{
  background-color: transparent;
    border: 2px solid #fff;
    color: #fff;

    font-size: 12px;
    font-size: .75rem;
    font-weight: bold;
    padding: 0.5rem;
    text-align: center;
    position:relative;

}

.thumb2:hover button{
  background-color: #fff;
    border: 2px solid #fff;
    color: #000;

    font-size: 12px;
    font-size: .75rem;
    font-weight: bold;
    padding: 0.5rem;
    text-align: center;
    position:relative;

}
</style>

      <!-- Banner Area Start -->
	    <div class="banner-area pt-40">
	        <div class="container">
	            <div class="row">

                <!--
                @if($banner)
                  @foreach($banner as $k1)

                  @if($k1->banner_sort == 2)
                  <div class="col-lg-6 col-md-6">
                        <a class="crop banner-image" href="{{$k1->url_banner}}">
                          <h1 class="top-left text-{{$k1->color_banner}}">{{$k1->text_banner}}</h1>
                          <img src="{{url('assets/image/banner/'.$k1->image_banner)}}" alt=""></a>
	                </div>
                  @else
                  <div class="col-lg-3 col-md-3">
                    <h1 class="top-left text-{{$k1->color_banner}}">{{$k1->text_banner}}</h1>
                        <a class="crop banner-image" href="{{$k1->url_banner}}"><img src="{{url('assets/image/banner/'.$k1->image_banner)}}" alt=""></a>
	                </div>
                  @endif


                  @endforeach
  	            @endif
              -->
              @if($banner)
                @foreach($banner as $k1)


                <div class="col-md-4 grid-item grid-item2">
                <div class="thumb1" style="background: url({{url('assets/image/banner/'.$k1->image_banner)}}) 50% 50% no-repeat;">
                  <a  href="{{$k1->url_banner}}">
                    <span class="banner-hover-text">{{$k1->text_banner}}<br />
                      <button>View Artworks</button>
                    </span>
                  </a>

                </div>
                </div>


            <!--    <div class="col-md-4 grid-item grid-item2">
                <div class="thumb2 banner-image" style="background: url({{url('assets/image/banner/'.$k1->image_banner)}}) 70% 70% no-repeat;">
                  <a href="{{$k1->url_banner}}" style="color:{{$k1->color_banner}}">
                    <span class="banner-hover-text">{{$k1->text_banner}}<br />
                      <button>View Artworks</button>
                    </span>
                  </a>

                </div>
              </div> -->



              @endforeach
            @endif


	            </div>
	        </div>
	    </div>
	    <!-- Banner Area End -->




      <?php
      $s = 1;
       ?>



       <!-- Product Area Start -->
       	    <div class="product-area text-center pt-20 pb-50">
       	        <div class="container">
       	            <div class="section-title">
                           <span>FEATURED SHOP ITEMS</span>
       	                <h2><span>AWARD PHOTO</span></h2>
       	            </div>
       	        </div>
       	        <div class="container">
       	            <div class="custom-row">

       	             <!--   <div class="product-carousel owl-carousel carousel-style-one">


                          @if($objs_award)
                            @foreach($objs_award as $objs_awards)

       	                    <div class="custom-col">
       	                        <div class="product-item">
                                       <div class="product-image-hover">
                                           <a class="banner-image" href="{{url('product/'.$objs_awards->id_p)}}">
                                               <img class="primary-image" src="{{url('assets/image/product/'.$objs_awards->pro_image)}}" alt="{{$objs_awards->pro_name}}">

                                           </a>

                                       </div>
                                       <div class="product-text">
                                         <div class="product-rating" style="margin-bottom: 0px;">
                                            <?php
                                            for($i=1;$i <= $objs_awards->pro_rating;$i++){
                                            ?>
                                             <i class="fa fa-star color"></i>
                                            <?php
                                            }

                                            $total = 5;
                                            $total -= $objs_awards->pro_rating;

                                            for($i=1;$i <= $total;$i++){
                                            ?>
                                            <i class="fa fa-star"></i>
                                            <?php
                                            }
                                            ?>

                                         </div>
                                           <h4 style="margin-bottom: 0px; line-height: 20px;"> <a href="{{url('product/'.$objs_awards->id_p)}}">{{str_limit($objs_awards->pro_name, 38, '..')}}</a></h4>
                                           <div class="product-price" style="margin-bottom: 0px;"><span>฿{{number_format((float)$objs_awards->pro_price , 2, '.', '')}}</span></div>
                                       </div>
       	                        </div>
       	                    </div>
                            @endforeach
                   @endif


                 </div> -->
<style>
.sp-caption-container {
  font-weight: 600;
  font-size: 14px;
}
</style>
                 <div class="slider-pro" id="my-slider">

                  	<div class="sp-slides">


                      @if($objs_award)
                        @foreach($objs_award as $objs_awards)


                      <div class="sp-slide">
                				<a href="{{url('assets/image/product/'.$objs_awards->pro_image)}}">
                					<img class="sp-image" src="{{url('assets/slider-pro/css/images/blank.gif')}}"
                						data-src="{{url('assets/image/product/'.$objs_awards->pro_image)}}"
                						data-retina="{{url('assets/image/product/'.$objs_awards->pro_image)}}"/>
                				</a>
                				<p class="sp-caption"><a class="banner-image" href="{{url('product/'.$objs_awards->id_p)}}">{{str_limit($objs_awards->pro_name, 38, '..')}} <br /> <span style="  font-weight: 400;">฿{{number_format((float)$objs_awards->pro_price , 2, '.', '')}}</span></a></p>

                			</div>

                      @endforeach
             @endif







                  	</div>

                  </div>


       	            </div>
       	        </div>
       	    </div>
       	    <!-- Product Area End -->



            <div class="product-area text-center  ">
       	        <div class="container">
       	            <div class="section-title">
                      <span>FEATURED SHOP ITEMS</span>
       	                <h2><span>GROUP PHOTO</span></h2>
       	            </div>
       	        </div>
            </div>


<style>
.thumb1 {

  width: 100%;
  height: 250px;
}
.banner-hover-text {
    background: rgba(253, 253, 253, 0.0) none repeat scroll 0 0;
    bottom: 20px;
    color: #fff;
    font-family: "Poppins",sans-serif;
    font-size: 16px;
    font-weight: bold;
    left: 0;
    margin: 0;
    padding: 13px 0 12px;
    position: absolute;
    text-align: center;
    text-transform: uppercase;
    width: 100%;
}
.thumb1 button{
  background-color: transparent;
    border: 2px solid #fff;
    color: #fff;

    font-size: 12px;
    font-size: .75rem;
    font-weight: bold;
    padding: 0.5rem;
    text-align: center;
    position:relative;

}
.grid-item2{
  margin-top:20px;
}
.product-text {
    padding-top: 10px;
}
.thumb1:hover button{
  background-color: #fff;
    border: 2px solid #fff;
    color: #000;

    font-size: 12px;
    font-size: .75rem;
    font-weight: bold;
    padding: 0.5rem;
    text-align: center;
    position:relative;

}
</style>

            <!-- Banner Area Start -->
	    <div class="banner-area">

	        <div class="container">

	            <div class="row grid">

                <!--
                @if($objs_group)
                  @foreach($objs_group as $objs_groups)
	                <div class="col-md-3 grid-item">
                        <a class="banner-image" href="{{url('product/'.$objs_groups->id_p)}}">
                            <img src="{{url('assets/image/product/'.$objs_groups->pro_image)}}" alt="{{$objs_groups->pro_name}}">
                            <span class="banner-hover-text">{{str_limit($objs_groups->pro_name, 38, '..')}}</span>
                        </a>
	                </div>
                  @endforeach
                  @endif
                -->

                @if($objs_group)
                  @foreach($objs_group as $objs_groups)
                  <div class="col-md-3 grid-item grid-item2">
                  <div class="thumb1" style="background: url({{url('assets/image/product/'.$objs_groups->pro_image)}}) 50% 50% no-repeat;">
                    <a href="{{url('product/'.$objs_groups->id_p)}}">
                      <span class="banner-hover-text">{{str_limit($objs_groups->pro_name, 38, '..')}}<br />
                        <button>฿{{number_format((float)$objs_groups->pro_price , 2, '.', '')}}</button>
                      </span>
                    </a>

                  </div>
                  </div>
                  @endforeach
                @endif


	            </div>
	        </div>
	    </div>
	    <!-- Banner Area End -->





      <!-- Feature Product Area Start -->
	    <div class="feature-product-area text-center ptb-50">
	        <div class="container">
	            <div class="section-title">
                    <span>NEW PHOTO ITEM</span>
	                <h2><span>New products</span></h2>
	            </div>
	        </div>
	        <div class="container">
	            <div class="custom-row">


              <!--      <div class="feature-product-carousel owl-carousel">


                      @if($objs_new)
                        @foreach($objs_new as $objs_news)
                        <div class="custom-col">
                            <div class="product-item mb-25">
                                <span class="">New</span>
                                <div class="product-image-hover">
                                    <a href="{{url('product/'.$objs_news->id_p)}}">
                                        <img class="primary-image" src="{{url('assets/image/product/'.$objs_news->pro_image)}}" alt="{{$objs_news->pro_name}}">

                                    </a>

                                </div>
                                <div class="product-text">
                                  <div class="product-rating">
                                     <?php
                                     for($i=1;$i <= $objs_news->pro_rating;$i++){
                                     ?>
                                      <i class="fa fa-star color"></i>
                                     <?php
                                     }

                                     $total = 5;
                                     $total -= $objs_news->pro_rating;

                                     for($i=1;$i <= $total;$i++){
                                     ?>
                                     <i class="fa fa-star"></i>
                                     <?php
                                     }
                                     ?>

                                  </div>
                                    <h4 style="margin-bottom: 0px; line-height: 20px;"><a href="shop.html">{{str_limit($objs_news->pro_name, 38, '..')}}</a></h4>
                                    <div class="product-price" style="margin-bottom: 0px;">
                                        <span>฿{{number_format((float)$objs_news->pro_price , 2, '.', '')}}</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                        @endforeach
               @endif

             </div> -->





                    <div class="slider-pro" id="my-slider2">

                     	<div class="sp-slides">


                         @if($objs_new)
                           @foreach($objs_new as $objs_news)


                         <div class="sp-slide">
                   				<a href="{{url('assets/image/product/'.$objs_news->pro_image)}}">
                   					<img class="sp-image" src="{{url('assets/slider-pro/css/images/blank.gif')}}"
                   						data-src="{{url('assets/image/product/'.$objs_news->pro_image)}}"
                   						data-retina="{{url('assets/image/product/'.$objs_news->pro_image)}}"/>
                   				</a>
                   				<p class="sp-caption"><a class="banner-image" href="{{url('product/'.$objs_news->id_p)}}">{{str_limit($objs_news->pro_name, 38, '..')}} <br /> <span style="  font-weight: 400;">฿{{number_format((float)$objs_news->pro_price , 2, '.', '')}}</span></a></p>

                   			</div>

                         @endforeach
                @endif







                     	</div>

                     </div>




	            </div>
	        </div>
	    </div>
	    <!-- Feature Product Area End -->









      <div class="product-area text-center  ">
          <div class="container">
              <div class="section-title">
                <span>FEATURED SHOP ITEMS</span>
                  <h2><span>RECOMMENDED ITEMS</span></h2>
              </div>
          </div>
      </div>



    <div class="banner-area">
	        <div class="container">





              <div class="row grid">

                <!--
                @if($objs_group)
                  @foreach($objs_group as $objs_groups)
	                <div class="col-md-3 grid-item">
                        <a class="banner-image" href="{{url('product/'.$objs_groups->id_p)}}">
                            <img src="{{url('assets/image/product/'.$objs_groups->pro_image)}}" alt="{{$objs_groups->pro_name}}">
                            <span class="banner-hover-text">{{str_limit($objs_groups->pro_name, 38, '..')}}</span>
                        </a>
	                </div>
                  @endforeach
                  @endif
                -->

                @if($objs_rec)
                  @foreach($objs_rec as $objs_recs)
                  <div class="col-md-4 grid-item grid-item2">
                  <div class="thumb1" style="background: url({{url('assets/image/product/'.$objs_recs->pro_image)}}) 50% 50% no-repeat;">
                    <a href="{{url('product/'.$objs_recs->id_p)}}">
                      <span class="banner-hover-text">{{str_limit($objs_recs->pro_name, 38, '..')}}<br />
                        <button>฿{{number_format((float)$objs_recs->pro_price , 2, '.', '')}}</button>
                      </span>
                    </a>

                  </div>
                  </div>
                  @endforeach
                @endif


	            </div>


	        </div>
	    </div>






 <!--    -->
    <!-- Banner Area End -->


<style>
.product-wid-img {
    width: 45%;
}
</style>



      <!-- Product Widget Area Start -->
	    <div class="product-widget-area pt-40 pb-40">
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
	                                <a href="{{url('product/'.$u->id)}}"><img src="{{url('assets/image/product/'.$u->pro_image)}}" style="height: 82px; overflow: hidden; width:100%" alt=""></a>
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


      <div class="blog-area pb-55">
	        <div class="container text-center">
	            <div class="section-title">
                    <!--<span>Latest New</span>-->
	                <h2><span>NEW MENU</span></h2>
	            </div>
	        </div>


          <div class="banner-area">
      	        <div class="container">


      	            <div class="row">
                      @if($cattegory_subs)
                        @foreach($cattegory_subs as $u)
      	                <div class="col-md-4">
                              <a class="banner-image" style="padding-top:10px;" href="{{url('cattegory_subs/'.$u->id)}}"><img src="{{url('assets/image/category_img_a/'.$u->image_cat)}}" alt="{{$u->name_cat}}"></a>
                              <div class="blog-text">
                                  <h5><a href="{{url('blog/'.$u->id)}}">{{$u->name_cat}}</a></h5>

                              </div>
      	                </div>
                        @endforeach
               @endif

      	            </div>
      	        </div>
      	    </div>


	    <!--    <div class="container">
	            <div class="custom-row">
                    <div class="blog-carousel owl-carousel">
                      @if($blog_new)
                        @foreach($blog_new as $u)
                        <div class="custom-col">
                            <div class="single-blog">
                                <div class="blog-image">
                                    <a href="{{url('blog/'.$u->id)}}">
                                        <img src="{{url('assets/image/blog/'.$u->blog_img)}}" alt="{{$u->blog_title}}">
                                        <span>05 <span>July</span></span>
                                    </a>
                                </div>
                                <div class="blog-text">
                                    <h5><a href="blog.html">{{$u->blog_title}}</a></h5>
                                    <p>{{str_limit($u->blog_header, 48, '..')}}</p>
                                    <a href="{{url('blog/'.$u->id)}}">Read More</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
        	            @endif


                    </div>
	            </div>
	        </div> -->



	    </div>
	    <!-- Blog Area End -->






	 <!--    -->
	    <!-- Banner Area End -->

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
<script src="{{url('assets/slider-pro/js/jquery.sliderPro.min.js')}}"></script>
<script src="{{url('assets/fancybox/jquery.fancybox.pack.js')}}"></script>

<!-- <script src="{{url('assets/slider-pro/examples.js')}}"></script> Load Facebook SDK for JavaScript -->
<script type="text/javascript">
	jQuery( document ).ready(function( $ ) {
		$( '#my-slider' ).sliderPro({
      width: 300,
      height: 300,
      visibleSize: '100%',
      forceSize: 'fullWidth',
      autoSlideSize: true
    });

    $( '#my-slider2' ).sliderPro({
      width: 300,
      height: 300,
      visibleSize: '100%',
      forceSize: 'fullWidth',
      autoSlideSize: true
    });

    // instantiate fancybox when a link is clicked
		$( ".slider-pro" ).each(function(){
			var slider = $( this );
			slider.find( ".sp-image" ).parent( "a" ).on( "click", function( event ) {
				event.preventDefault();

				if ( slider.hasClass( "sp-swiping" ) === false ) {
					var sliderInstance = slider.data( "sliderPro" ),
						isAutoplay = sliderInstance.settings.autoplay;
					$.fancybox.open( slider.find( ".sp-image" ).parent( "a" ), {
						index: $( this ).parents( ".sp-slide" ).index(),
						afterShow: function() {
							if ( isAutoplay === true ) {
								sliderInstance.settings.autoplay = false;
								sliderInstance.stopAutoplay();
							}
						},
						afterClose: function() {
							if ( isAutoplay === true ) {
								sliderInstance.settings.autoplay = true;
								sliderInstance.startAutoplay();
							}
						}

					});
				}
			});
		});

	});
</script>





@stop('scripts')
