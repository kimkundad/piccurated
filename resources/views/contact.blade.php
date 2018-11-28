@extends('layouts.template')

@section('title')
Contact | Fulryu
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
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Breadcrumb Area End -->
        <!-- Contact Area Start -->
        <div class="contact-area ptb-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Google Map Start -->
                        <div class="google-map-area">
                            <!--  Map Section -->
                            <div id="contacts" class="map-area">
                                <div id="googleMap" style="width:100%;height:410px;"></div>
                            </div>
                        </div>
                        <!-- Google Map End -->
                    </div>
                    <div class="col-md-6">
                        <h4>GET IN TOUCH</h4>
                        <form action="{{url('/add_contact')}}" id="contact-form"  method="post">
                          {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="name" value="{{old('name')}}" placeholder="Your Name*">
                                    @if ($errors->has('name'))
                                  <span class="help-block">
                                      <strong>Please enter your name</strong>
                                  </span>
                                  @endif
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="email" value="{{old('email')}}" placeholder="Mail*">
                                    @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>Please enter your email address</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>

                            <textarea name="message"  cols="30" rows="10" placeholder="Type Your Message.......">{{old('message')}}</textarea>
                            @if ($errors->has('message'))
                                  <span class="help-block">
                                      <strong>Please enter your message!</strong>
                                  </span>
                              @endif
                            <div class="g-recaptcha" data-sitekey="6LfYpXAUAAAAADHUnng4xf7L4T2HI58XnpmNYfoI"></div>
                            @if ($errors->has('g-recaptcha-response'))
                                  <span class="help-block">
                                      <strong>Robot?!</strong>
                                  </span>
                              @endif
                            <br />
                            <button type="submit" class="default-btn submit-btn">SEND</button>
                            <p class="form-message"></p>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="contact-address-info bg-light-2">
                            <div class="single-contact-adrs text-center">
                                <span class="c-address-icon">
                                    <i class="fa fa-map-marker"></i>
                                </span>
                                <div class="adrs-text">
                                    <span>222/390 Soi Ruammitpattana yaak 5 Tarang <br /> Bangkhaen BKK 10220</span>
                                </div>
                            </div>
                            <div class="single-contact-adrs text-center">
                                <span class="c-address-icon">
                                    <i class="fa fa-phone"></i>
                                </span>
                                <div class="adrs-text">
                                    <span>+(66)639911075</span>
                                </div>
                            </div>
                            <div class="single-contact-adrs text-center">
                                <span class="c-address-icon">
                                    <i class="fa fa-globe"></i>
                                </span>
                                <div class="adrs-text">
                                    <span>Emil : fulryumail@gmail.com<br>Web : www.fulryu.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Area End -->



@endsection

@section('scripts')
<script src='https://www.google.com/recaptcha/api.js'></script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAK4LGFBZ_9xcolNkmikZcMrv22xvOBYhM"></script>
        <script>
            google.maps.event.addDomListener(window, 'load', init);
            function init() {
                var mapOptions = {
                    zoom: 11,
                    center: new google.maps.LatLng(13.76751, 100.5064158), // New York
                    styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
                };
                var mapElement = document.getElementById('googleMap');
                var map = new google.maps.Map(mapElement, mapOptions);
                var marker = new google.maps.Marker({
                    position: map.getCenter(),
                    animation:google.maps.Animation.BOUNCE,
                    icon: '{{url('home/assets/img/map-marker.png')}}',
                    map: map
                });
            }
        </script>

@stop('scripts')
