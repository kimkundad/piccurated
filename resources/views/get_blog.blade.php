@extends('layouts.template')

@section('title')
All Blog | Fulryu
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
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Breadcrumb Area End -->
	    <!-- Blog Section Start -->
	    <div class="blog-section pt-80 pb-35">
	        <div class="container">
	            <div class="row">


                @if($blog)
                  @foreach($blog as $u)

                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a href="{{url('blog/'.$u->id)}}">
                                    <img src="{{url('assets/image/blog/'.$u->blog_img)}}" alt="{{$u->blog_title}}">
                                    <span>{{date('d', strtotime($u->created_at))}} <span>{{date('M', strtotime($u->created_at))}}</span></span>
                                </a>
                            </div>
                            <div class="tour_title" >
  							                 <h3 class="text_title">{{substr($u->blog_title, 0, 120)}}</h3>
  						              </div>
                        </div>
                    </div>
                @endforeach
              @endif

              {{$blog->links()}}

	            </div>
	        </div>
	    </div>
	    <!-- Blog Section End -->



@endsection

@section('scripts')



@stop('scripts')
