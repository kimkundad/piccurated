@extends('layouts.template')

@section('title')
About | Fulryu ความรู้สึกที่สัมผัสได้แต่ไม่สามารถมองเห็น
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
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Breadcrumb Area End -->
        <!-- About Skill Area Start -->
        <div class="about-skill-area pt-80 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h2>ABOUT fulryu</h2>
                        <div class="about-skill-test">
                            <p>fulryu มาจากคำภาษาญี่ปุ่นว่า furyu (ฟูริว) ซึ่งประกอบขึ้นจากคำสองคำคือ “ลม” และ “การไหลไป” เช่นกันกับลม, นี่คือความรู้สึกที่สัมผัสได้แต่ไม่สามารถมองเห็น ‘ฟูริว’ ชี้ให้เห็นถึงความงามชั่วคราวซึ่งต้องมีประสบการณ์ตรง ณ ขณะนี้เท่านั้น เพราะในห้วงเวลาถัดไปความรู้สึกนั้นก็จะจางหายไปเหมือนหมอกเช้า</p>
                            <p>บทกวีไฮกุที่สื่อสารอารมณ์ของ ‘ฟูริว’ ได้เป็นอย่างดีคือบทกวีคลาสสิกของบาโช <br />
                              สระโบราณ<br />
                              กบกระโดด<br />
                              เสียงน้ำ<br />
                              เป็นเหตุการณ์ที่เกิดขึ้นและจบลง แต่บาโชสามารถจับความงามในห้วงเวลานั้นไว้ได้ด้วยบทกวี<br />
                            </p>
                            <p>
                              <strong>‘ฟูริว’ จึงเป็นความงามที่เกิดขึ้นแล้วพัดผ่านไป</strong>
                            </p>
                            <p>
                              การสะกด ‘fulryu’ ด้วยการเติมตัว l เข้าไปตรงกลางเพื่อต้องการเพิ่มความหมายว่า เพราะความงามนั้นเกิดขึ้นแล้วจบลง เราจึงควรซึมซับความงามนั้นอย่าง ‘เต็มอิ่ม’ เพื่อสัมผัสประสบการณ์ที่สิ่งนั้นมอบให้อย่างสมบูรณ์
                            </p>
                            <p>
                              <strong>แนวความคิด:</strong> เราใช้ชีวิตอยู่ในวิถีชีวิตสมัยใหม่ซึ่งเน้นความรวดเร็ว แถมยังเป็นยุคสมัยที่ท่วมท้นไปด้วยข้อมูลข่าวสารมากเสียจนไม่มีเวลาที่จะพินิจพิจารณาสิ่งต่างๆ อย่างละเอียดถี่ถ้วน ทั้งที่ความเนิบช้าและละเอียดอ่อนนี้เองที่ทำให้เรามองเห็นคุณค่าของสิ่งต่างๆ ผู้คน รวมถึงคุณค่าของชีวิตตัวเอง
                            </p>
                            <p>
                              ‘ฟูริว’ เชื่อว่าทุกสิ่งตรงหน้านั้นมีความหมาย, เราต้องการชี้ชวนให้เพื่อนๆ มองเห็นคุณค่าและความหมายที่ซุกซ่อนอยู่ในข้าวของเครื่องใช้ในชีวิตประจำวัน เพราะเราเชื่อในคุณค่าของความคิด ความชำนาญ ความสร้างสรรค์ และความพิถีพิถันที่คลุกเคล้าลงไปในวัตถุสิ่งของ สิ่งเหล่านี้เองที่ทำให้ “ของ” กลายเป็น “ของขวัญ” สิ่งเหล่านี้เองที่ทำให้ “ของ” เหล่านั้นมิใช่แค่สิ่งของ หากยังมีคุณค่าทางความคิดและจิตใจ
                            </p>

                            <p>
                              ลองสังเกตรอบตัวจะพบว่า มีสิ่งของบางชิ้นในโลกนี้ที่สร้างพลังบันดาลใจให้กับเรา บางชิ้นคอยสะกิดเตือนเพื่อบอกความคิดดีๆ ให้กับเรา บางชิ้นทำให้เราอยากลงมือทำอะไรบางอย่างของตัวเอง ‘ฟูริว’ เชื่อว่าการใช้ “ของ” ที่ถูกคิดและสร้างสรรค์มาอย่างพิถีพิถันทำให้เรามีชีวิตที่สวยงามเปี่ยมพลัง
                              <br />
                              ณ ชั่วขณะที่เราหยิบสิ่งนั้นขึ้นมา เราจะได้พบพลังบางอย่างที่ซ่อนไว้ในของชิ้นนั้น
                              <br />
                              เราเชื่อว่ามีแรงบันดาลใจซ่อนอยู่ในสิ่งของ และผลิตภัณฑ์ของเราจะส่งมอบแรงบันดาลใจนั้นให้กับคุณ
                            </p>




                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- About Skill Area End -->
        <!-- Team Area Start -->
        <div class="team-area team-area pb-80">
            <div class="container">
	            <div class="section-title text-center title-style-2">
                    <span>Meet Our Team</span>
	                <h2><span>Our Member</span></h2>
	            </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-4">
                        <div class="single-team">
                            <div class="team-image"><img src="{{url('assets/image/maxresdefault.jpg')}}" alt=""></div>
                            <div class="team-hover">
                                <h4>สราวุธ เฮ้งสวัสดิ์ (เอ๋)</h4>
                                <span class="block">นิ้วกลม</span>
                                <div class="team-links">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-rss"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <div class="single-team">
                            <div class="team-image"><img src="{{url('assets/image/maxresdefault2.jpg')}}" alt=""></div>
                            <div class="team-hover">
                                <h4>สราวุธ เฮ้งสวัสดิ์ (เอ๋)</h4>
                                <span class="block">นิ้วกลม</span>
                                <div class="team-links">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-rss"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <div class="single-team">
                            <div class="team-image"><img src="{{url('assets/image/maxresdefault3.jpg')}}" alt=""></div>
                            <div class="team-hover">
                                <h4>สราวุธ เฮ้งสวัสดิ์ (เอ๋)</h4>
                                <span class="block">นิ้วกลม</span>
                                <div class="team-links">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-rss"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team Area End -->

@endsection

@section('scripts')

@stop('scripts')
