<!-- Header Area Start -->
        <header class="header-two-area header-sticky">
            <div class="custom-container">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="logo">
                            <a href="{{url('/')}}"><img src="{{url('assets/image/logo-website.png')}}?v1" style="height:64px" alt="fulryu"></a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-3 d-none d-md-block d-lg-block d-xl-block">
                        <div class="main-menu display-none">
                            <nav>
                                <ul>

                                  <li ><a href="{{url('/')}}">Home</a>
                                  </li>

                                  <li><a >Product</a>
                                      <ul>
                                        @if($cat1)
                                          @foreach($cat1 as $j)
                                          <li><a href="{{url('category/'.$j->id)}}">{{$j->name_cat}}</a></li>
                                          @endforeach
                                        @endif
                                      </ul>
                                  </li>
                                  <li ><a href="{{url('get_blog')}}">Blog</a>
                                  </li>

                                    <li ><a href="{{url('/about')}}">About</a>
                                    </li>
                                    <li ><a href="{{url('/contact')}}">Contact</a>
                                    </li>

                                    <li ><a href="{{url('/confirm_payment')}}">Payment</a>
                                    </li>






                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-5">
                        <div class="header-two-content">
                            <div class="search-form-two">
                                <a href="#" class=""><img src="{{url('home/assets/img/icon/search.png')}}" alt=""></a>
                                <form action="#" method="post">
                                    <input type="text" placeholder="Search for item...">
                                    <button><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div class="header-settings">
                                @if (Auth::guest())
                                <a href="{{url('login')}}"><img src="{{url('home/assets/img/users-512.png')}}" style="height:19px;" alt=""> Login</a>
                                @else
                                <a href="#"><img src="{{url('home/assets/img/users-512.png')}}" style="height:19px;" alt=""> {{str_limit(Auth::user()->name, 10, '.')}} </a>
                                <ul>
                                  @if(Auth::user()->is_admin == 1)
                                    <li><a href="{{url('admin/dashboard')}}"><i class="im im-icon-Alien-2"></i>Controller</a></li>
                                    @endif
                                      <li><a href="{{url('user_profile')}}">My Account</a></li>

                                      <li><a href="{{url('logout')}}">Sign Out</a></li>

                                  </ul>
                                @endif
                              <!--  <ul>
                                    <li><a href="account.html">My Account</a></li>
                                    <li><a href="wishlist.html">My Wishlist</a></li>
                                    <li><a href="account.html">Sign In</a></li>
                                    <li>
                                        <a href="#">Currency</a>
                                        <ul class="header-menu-list">
                                            <li><a href="#">USD</a></li>
                                            <li><a href="#">BDT</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Language</a>
                                        <ul class="header-menu-list">
                                            <li><a href="#">English</a></li>
                                            <li><a href="#">French</a></li>
                                        </ul>
                                    </li>
                                </ul> -->
                            </div>
                            <?php
                              $set_num_date = count(Session::get('cart'));
                             ?>
                            <div class="cart-box-wrapper">
                                <a class="cart-info" >
                                    <img src="{{url('home/assets/img/icon/cart-2.png')}}" alt="">
                                    <span>{{$set_num_date}}</span>
                                </a>
                                <div class="cart-dropdown">
                                <?php
                                if(!Session::get('cart')){

                                ?>



                                  <p style="padding-left:20px;margin-bottom: 0rem;">

                                  Cart empty
                                </p>




                                <?php
                                  }else{
                                    $total = 0;
                                    $total_item = 0;
                                    $i = 1 ;

                                    foreach(Session::get('cart') as $u){

                                      $total_item += $u['data'][1]['sum_item'];
                                      $total += $u['data'][2]['sum_price'];
                                 ?>

                                 <div class="cart-dropdown-item">
                                     <div class="cart-p-image">
                                         <a href="cart.html"><img src="{{url('assets/image/product/'.$u['data']['image'])}}" style="height:70px;" alt=""></a>
                                     </div>
                                     <div class="cart-p-text">
                                         <a href="cart.html" class="cart-p-name">{{$u['data']['name']}}</a>
                                         <span>฿{{$u['data']['price']}}.00</span>
                                         <div class="cart-p-qty">

                                             <a href="{{url('del_cart/'.$u['data']['id'])}}"><i class="icon icon-Delete"></i></a>
                                         </div>
                                     </div>
                                 </div>


                                 <?php
                                  $i++;
                                    }
                                   ?>

                                   <div class="cart-item-a-wrapper">
                                       <div class="cart-item-amount">
                                           <span class="cart-number"><span>{{$total_item}}</span> items</span>
                                           <div class="cart-amount">
                                               <h5>Cart Subtotal :</h5>
                                               <h4>฿{{$total}}.00</h4>
                                           </div>
                                       </div>
                                       <a href="{{url('/cart')}}" class="grey-button">Go to Checkout</a>
                                   </div>

                                   <?php
                                      }
                                     ?>

                                     </div>

                            <!--    <div class="cart-dropdown">
                                    <button class="close"><i class="fa fa-close"></i></button>
                                    <div class="cart-item-a-wrapper">
                                        <div class="cart-item-amount">
                                            <span class="cart-number"><span>0</span> items</span>
                                            <div class="cart-amount">
                                                <h5>Cart Subtotal :</h5>
                                                <h4>$70.00</h4>
                                            </div>
                                        </div>
                                        <a href="checkout.html" class="grey-button">Go to Checkout</a>
                                    </div>
                                    <div class="cart-dropdown-item">
                                        <div class="cart-p-image">
                                            <a href="cart.html"><img src="{{url('home/assets/img/cart/s-1.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="cart-p-text">
                                            <a href="cart.html" class="cart-p-name">Crown Summit Backpack</a>
                                            <span>$38.00</span>
                                            <div class="cart-p-qty">

                                                <button><i class="icon icon-Delete"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-dropdown-item">
                                        <div class="cart-p-image">
                                            <a href="cart.html"><img src="{{url('home/assets/img/cart/s-2.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="cart-p-text">
                                            <a href="cart.html" class="cart-p-name">Strive Shoulder Pack</a>
                                            <span>$32.00</span>
                                            <div class="cart-p-qty">

                                                <button><i class="icon icon-Delete"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cart-btn-wrapper">
                                        <a href="cart.html" class="grey-button">View and edit cart</a>
                                    </div>
                                </div> -->



                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu Area Start -->
                <div class="mobile-menu-area row">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul class="menu-overflow">

                                <li ><a href="{{url('/')}}">Home</a>
                                </li>

                                <li><a >Product</a>
                                    <ul>
                                      @if($cat1)
                                        @foreach($cat1 as $j)
                                        <li><a href="{{url('category/'.$j->id)}}">{{$j->name_cat}}</a></li>
                                        @endforeach
                                      @endif
                                    </ul>
                                </li>
                                <li ><a href="{{url('get_blog')}}">Blog</a>
                                </li>

                                  <li ><a href="{{url('/about')}}">About</a>
                                  </li>
                                  <li ><a href="{{url('/contact')}}">Contact</a>
                                  </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Mobile Menu Area End -->
            </div>
        </header>
        <!-- Header Area Start -->
