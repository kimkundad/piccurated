<!-- Header Area Start -->
        <header class="header-area bg-ash">
            <!--Header Top Area Start -->
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <span class="welcome-text">Welcome you to Piccurated store!</span>
                        </div>
                        <div class="col-md-8">
                            <div class="header-top-links">

                                <div class="account-wishlist">
                                      @if (Auth::guest())
                                      <a href="{{url('login')}}">Sign In</a>
                                      @else

                                        @if(Auth::user()->is_admin == 1)
                                        <a href="{{url('admin/product')}}">My Account</a>
                                        @else
                                        <a href="{{url('user_profile')}}">My Account</a>
                                        @endif

                                      @endif

                                    <a href="{{url('wishlist')}}">My Wish List</a>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Header Top Area End -->
            <!--Header Middle Area Start -->
            <div class="header-middle-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="logo">

                                <a href="{{url('/')}}"><img src="{{url('assets/image/logo-website.png')}}?v1" alt="fulryu" style="height:80px"></a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <span class="email-image" style="padding: 20px 0;">
                                <span><img src="{{url('home/assets/img/icon/email.png')}}" alt=""></span>
                                <span><span>Email: </span>Piccurated@gmail.com</span>
                            </span>
                        </div>


                        <div class="col-md-6">
                            <form action="{{url('search')}}" method="post" class="header-search" style="margin: 25px 0;">
                              {{ csrf_field() }}
                                <input type="text" name="search_name" placeholder="Search for item...">
                                <button><i class="icon icon-Search"></i></button>
                            </form>

                            <?php
                              $set_num_date = count(Session::get('cart'));
                             ?>
                            <div class="cart-box-wrapper" style="margin: 7px 0 29px;">
                                <a class="cart-info" >
                                  <span>
                                    <img src="{{url('home/assets/img/icon/cart.png')}}" alt="">
                                    <span>{{$set_num_date}}</span>
                                    </span>
                                    <span>My Cart</span>
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


                            </div>





                        </div>




                    </div>
                </div>
            </div>
            <!--Header Middle Area End -->
            <!-- Mainmenu Area Start -->
            <div class="mainmenu-area header-sticky display-none">
                <div class="container">
                    <div class="menu-wrapper">
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li><a href="{{url('/')}}">Home</a>

                                    </li>

                                    <li><a href="{{url('category_main/1')}}">PRINT</a></li>
                                    <li><a href="{{url('category_main/4')}}">BOOK</a></li>
                                    <li><a href="{{url('category_main/3')}}">ART</a></li>

                                    <li><a href="{{url('get_blog')}}">Blog</a>

                                    </li>


                                    <li><a href="{{url('/contact')}}">Contact</a></li>


                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mainmenu Area End -->
            <!-- Mobile Menu Area Start -->
            <div class="mobile-menu-area container">
                <div class="mobile-menu">
                  <nav id="mobile-menu-active">
                      <ul class="menu-overflow">

                          <li ><a href="{{url('/')}}">Home</a>
                          </li>

                          <li><a href="{{url('category_main/1')}}">PRINT</a></li>
                          <li><a href="{{url('category_main/4')}}">BOOK</a></li>
                          <li><a href="{{url('category_main/3')}}">ART</a></li>

                          <li ><a href="{{url('get_blog')}}">Blog</a>
                          </li>


                            <li ><a href="{{url('/contact')}}">Contact</a>
                            </li>
                      </ul>
                  </nav>
                </div>
            </div>
            <!-- Mobile Menu Area End -->
        </header>
        <!-- Header Area End -->
