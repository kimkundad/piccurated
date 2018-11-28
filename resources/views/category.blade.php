@extends('layouts.template')

@section('title')
{{$category->name_cat}} | Fulryu
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
</style>

@stop('stylesheet')
@section('content')



<!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-dark">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$category->name_cat}}</li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Breadcrumb Area End -->
        <!-- Shop Area Start -->
        <div class="shop-area ptb-80">
            <div class="container">
                <div class="row">
                    <div class="order-xl-2 order-lg-2 col-xl-9 col-lg-8">
                      <div class="shop-banner">
                          <img src="{{url('assets/image/category_img/'.$category->image_cat)}}" alt="{{$category->name_cat}}">
                      </div>
                        <h1 class="page-title"> {{$category->name_cat}} </h1>
                        <div class="ht-product-tab">
                            <div class="nav" role="tablist">
                                <a class="active" href="#grid" data-toggle="tab" role="tab" aria-selected="true" aria-controls="grid"><i class="fa fa-th"></i></a>
                                <a href="#list" data-toggle="tab" role="tab" aria-selected="false" aria-controls="list"><i class="fa fa-th-list" aria-hidden="true"></i></a>
                            </div>
                            <div class="shop-content-wrapper">
                                <div class="shop-results" style="float: left;"><span>Sort By</span>
                                  <form action="{{url('category/'.$category->id)}}" method="get" enctype="multipart/form-data" style="float: left;">
                                    {{ csrf_field() }}
                                    <select name="Sort_by" id="number" onchange="this.form.submit()">
                                        <option value="p-name" @if($sort_set == 1) selected='selected'
                                        @endif>product name</option>
                                        <option value="p-price" @if($sort_set == 2) selected='selected'
                                        @endif>price</option>
                                    </select>
                                    </form>
                                </div>
                                <div class="shop-items">
                                    <a href="#"><i class="fa fa-long-arrow-up"></i></a>
                                    <span>Items {{$category_count}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="ht-product-shop tab-content">
                            <div class="tab-pane active show fade text-center" id="grid" role="tabpanel">
                                <div class="row">

                                  @if($product)
                                     @foreach($product as $u)
                                   <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="product-item">
                                            <div class="product-image-hover">
                                                <a href="{{url('product/'.$u->id)}}">
                                                    <img class="primary-image" src="{{url('assets/image/product/'.$u->pro_image)}}" alt="">
                                                </a>
                                            <!--    <div class="product-hover">
                                                    <button><i class="icon icon-FullShoppingCart"></i></button>
                                                    <a href="wishlist.htnl"><i class="icon icon-Heart"></i></a>
                                                    <a href="wishlist.htnl"><i class="icon icon-Files"></i></a>
                                                </div> -->
                                            </div>
                                            <div class="product-text">
                                                <div class="product-rating">
                                                  <?php
                                                  for($i=1;$i <= $u->pro_rating;$i++){
                                                  ?>
                                                  <i class="fa fa-star color"></i>
                                                  <?php
                                                  }
                                                  ?>
                                                  <?php
                                                  $total = 5;
                                                  $total -= $u->pro_rating;

                                                  for($i=1;$i <= $total;$i++){
                                                  ?>
                                                  <i class="fa fa-star"></i>
                                                  <?php
                                                  }
                                                  ?>
                                                </div>
                                                <h4><a href="product-details.html">{{$u->pro_name}}</a></h4>
                                                <div class="product-price"><span>฿{{$u->pro_price}}</span></div>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach
                                 @endif




                                </div>
                            </div>
                            <div class="tab-pane fade" id="list" role="tabpanel">

                              @if($product)
                                 @foreach($product as $u)
                                 <div class="product-item">
                                    <div class="" style="width:175px">
                                        <a href="{{url('product/'.$u->id)}}">
                                            <img class="primary-image" src="{{url('assets/image/product/'.$u->pro_image)}}" style="width:175px; max-width:175px;" alt="{{$u->pro_name}}">

                                        </a>
                                    <!--    <div class="product-hover">
                                            <button><i class="icon icon-FullShoppingCart"></i></button>
                                            <a href="wishlist.htnl"><i class="icon icon-Heart"></i></a>
                                            <a href="wishlist.htnl"><i class="icon icon-Files"></i></a>
                                        </div> -->
                                    </div>
                                    <div class="product-text">
                                        <div class="product-rating">
                                          <?php
                                          for($i=1;$i <= $u->pro_rating;$i++){
                                          ?>
                                          <i class="fa fa-star color"></i>
                                          <?php
                                          }
                                          ?>
                                          <?php
                                          $total = 5;
                                          $total -= $u->pro_rating;

                                          for($i=1;$i <= $total;$i++){
                                          ?>
                                          <i class="fa fa-star"></i>
                                          <?php
                                          }
                                          ?>
                                        </div>
                                        <h4><a href="product-details.html">{{$u->pro_name}}</a></h4>
                                        <div class="product-price"><span>฿{{$u->pro_price}}</span></div>
                                        <p>{{$u->pro_title}}</p>
                                        <a href="{{url('product/'.$u->id)}}">ดูรายละเอียด</a>
                                    </div>
                                </div>

                                @endforeach
                             @endif












                            </div>
                        </div>





                        <div class="pagination-wrapper">
                            <nav aria-label="navigation">

                                {{$product->links()}}
                            </nav>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="sidebar-widget widget-style-1 panel-group" id="widget-parent" aria-multiselectable="true" role="tablist">
                            <h4>Shop By</h4>
                            <div class="panel widget-option">
                                <a data-toggle="collapse" href="#category" data-parent="#widget-parent">Category</a>
                                <div class="collapse show" id="category">
                                    <div class="collapse-content">

                                      @if($cat1)
                                        @foreach($cat1 as $j)
                                        <div class="single-widget-opt">

                                            <a href="{{url('category/'.$j->id)}}" style="color: #666; font-weight: 700; font-size: 12px;">
                                              {{$j->name_cat}} <span>({{$j->count}})</span>
                                            </a>

                                        </div>
                                        @endforeach
                                      @endif


                                    </div>
                                </div>
                            </div>

                          <!--  <div class="panel widget-option">
                                <a class="collapsed" data-toggle="collapse" href="#price" data-parent="#widget-parent">Price</a>
                                <div class="collapse" id="price">
                                    <div class="collapse-content">
                                        <div class="single-widget-opt">
                                            <input type="checkbox" id="low">
                                            <label for="low">$0.00 - $9.99 <span>(3)</span></label>
                                        </div>
                                        <div class="single-widget-opt">
                                            <input type="checkbox" id="l-t-m">
                                            <label for="l-t-m">$10.00 - $19.99 <span>(2)</span></label>
                                        </div>
                                        <div class="single-widget-opt">
                                            <input type="checkbox" id="medium">
                                            <label for="medium">$30.00 - $39.99 <span>(3)</span></label>
                                        </div>
                                        <div class="single-widget-opt">
                                            <input type="checkbox" id="m-t-h">
                                            <label for="m-t-h">$40.00 - $49.99 <span>(4)</span></label>
                                        </div>
                                        <div class="single-widget-opt">
                                            <input type="checkbox" id="high">
                                            <label for="high">$50.00 - $59.99 <span>(1)</span></label>
                                        </div>
                                        <div class="single-widget-opt">
                                            <input type="checkbox" id="highest">
                                            <label for="highest">$70.00 And Above <span>(1)</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                        </div>


                        <div class="sidebar-widget">
                            <h4>Most viewed</h4>

                          @if($hot)
                            @foreach($hot as $k)
	                        <div class="product-widget-item">
	                            <div class="product-wid-img">
	                                <a href="{{url('product/'.$k->id)}}"><img src="{{url('assets/image/product/'.$k->pro_image)}}" alt=""></a>
	                            </div>
                                <div class="product-text">
                                    <h4><a href="product-details.html">{{$k->pro_name}}</a></h4>
                                    <div class="product-rating">
                                      <?php
                                      for($i=1;$i <= $k->pro_rating;$i++){
                                      ?>
                                      <i class="fa fa-star color"></i>
                                      <?php
                                      }
                                      ?>
                                      <?php
                                      $total = 5;
                                      $total -= $k->pro_rating;

                                      for($i=1;$i <= $total;$i++){
                                      ?>
                                      <i class="fa fa-star"></i>
                                      <?php
                                      }
                                      ?>
                                    </div>
                                    <div class="product-price"><span>฿{{$u->pro_price}}</span></div>
                                </div>
	                        </div>
                          @endforeach
                        @endif

                        </div>









                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Area End -->




@endsection

@section('scripts')

@stop('scripts')
