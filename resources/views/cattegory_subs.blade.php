@extends('layouts.template')

@section('title')
{{$category->name_cat}} | piccurated
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

                        <h1 class="page-title"> {{$category->name_cat}} </h1>
                        <div class="ht-product-tab">
                            <div class="nav" role="tablist">
                                <a class="active" href="#grid" data-toggle="tab" role="tab" aria-selected="true" aria-controls="grid"><i class="fa fa-th"></i></a>
                                <a href="#list" data-toggle="tab" role="tab" aria-selected="false" aria-controls="list"><i class="fa fa-th-list" aria-hidden="true"></i></a>
                            </div>
                            <div class="shop-content-wrapper">
                                <div class="shop-results" style="float: left;"><span>Sort By</span>
                                  <form action="{{url('cattegory_subs/'.$category->id)}}" method="get" enctype="multipart/form-data" style="float: left;">
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


                        <style>
                        .img_container {
                      position: relative;
                      max-height: 130px;
                      }
                        .img_container img {
                      -webkit-transform: scale(1.2);
                      transform: scale(1.2);
                      -webkit-transition: all .5s ease;
                      transition: all .5s ease;
                      -webkit-backface-visibility: hidden;
                      }
                      </style>


                        <div class="ht-product-shop tab-content">
                            <div class="tab-pane active show fade text-center" id="grid" role="tabpanel">
                                <div class="row">

                                  @if($product)
                                     @foreach($product as $u)
                                   <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="product-item">
                                            <div class="product-image-hover">
                                              <div class="img_container" style="min-height:130px; overflow: hidden;">

                                                <a href="{{url('product/'.$u->id)}}">
                                                    <img class="primary-image" src="{{url('assets/image/product/'.$u->pro_image)}}" alt="">
                                                </a>

                                              </div>
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
                                        <h4 style="margin-bottom: 0px;"><a href="product-details.html">{{$u->pro_name}}</a></h4>
                                        <div class="product-price" style="margin-bottom: 0px;"><span>฿{{$u->pro_price}}</span></div>
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


                        </div>












                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Area End -->




@endsection

@section('scripts')

@stop('scripts')
