<!-- Footer Area Start -->
	    <footer class="footer-area">
            <div class="footer-top pt-80 pb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-5">
                            <div class="single-footer-widget">
                                <div class="footer-logo">
                                    <a href="#"><img src="{{url('assets/image/logo-website.png')}}" style="height:44px" alt=""></a>
                                </div>
                                <div class="single-footer-text">
                                    <span>Addresss: 222/390 Soi Ruammitpattana yaak 5 Tarang Bangkhaen BKK 10220</span>
                                    <span>Phone: +(66)639911075</span>

                                    <span>Email: fulryumail@gmail.com</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <div class="single-footer-widget">
                                <h4>ABOUT US</h4>
                                <ul class="footer-widget-list">
																		<li>
																			<a href="{{url('about')}}">About</a>
																		</li>
																		<li>
																			<a href="{{url('contact')}}">Contact</a>
																		</li>
                                    <li><a href="{{url('delivery_information')}}">Delivery Information</a></li>

                                    <li><a href="{{url('privacy_policy')}}">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4">
                            <div class="single-footer-widget">
                                <h4>INFORMATION</h4>
                                <ul class="footer-widget-list">
                                    <li><a href="{{url('term_of_service')}}">Terms of Service</a></li>

                                    <li><a href="{{url('return_policy')}}">Return Policy</a></li>
																		<li><a href="{{url('payment_option')}}">Payment Options</a></li>
																		<li ><a href="{{url('/confirm_payment')}}">Payment</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <div class="single-footer-widget">
                                <h4>my account</h4>
                                <ul class="footer-widget-list">

																	@if (Auth::guest())
																	<li><a href="{{url('login')}}">Register</a></li>
																	<li><a href="{{url('login')}}">Login</a></li>
																	@else

																		<li><a href="{{url('user_profile')}}">My Account</a></li>
																		<li><a href="{{url('logout')}}">Sign Out</a></li>
																	@endif

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="single-footer-widget">
                                <h4>sign up newsletter</h4>
                                <p>Be the first to hear about new trending and offers and see how youve helped</p>
                                <div class="newsletter-form mc_embed_signup">

                                        <div id="mc_embed_signup_scroll" class="mc-form">
                                            <input type="email" name="EMAIL" class="email_sub email" id="mce-EMAIL" placeholder="Enter your email address" required>
                                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->

                                            <button id="mc-embedded-subscribe" type="submit" class="post_sub" name="subscribe">Subscribe</button>
                                        </div>
																				<br />
																				<p class="writeinfo2 text-center">

																				</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <span>Copyright &copy; 2019 <a href="#">Fulryu Team</a>. All rights reserved.</span>
                        </div>
                        <div class="col-lg-4 col-md-2">
                            <div class="social-link">
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="payment-image">
                                <img src="{{url('home/assets/img/payment.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	    </footer>
	    <!-- Footer Area End -->
