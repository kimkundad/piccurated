<style>

ul.nav-main > li.nav-expanded > a {
  box-shadow: 2px 0 0 #ee413c inset;
}
html.no-overflowscrolling .nano > .nano-pane > .nano-slider {
    background: #ee413c;
}
.page-header h2 {
    border-bottom-color: #ee413c;
}
</style>
<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">

					<div class="sidebar-header">
						<div class="sidebar-title">
							Navigation
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar" ></i>
						</div>
					</div>

					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">

                  <li {{ (Request::is('admin/dashboard*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/dashboard/')}}"  >
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>


                  <li {{ (Request::is('admin/user*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/user/')}}"  >
											<i class="fa fa-user" aria-hidden="true"></i>
											<span>รายชื่อสมาชิก</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/category*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/category/')}}"  >
											<i class="fa fa-tasks" aria-hidden="true"></i>
											<span>หมวดหมู่</span>
										</a>
									</li>



                  <li {{ (Request::is('admin/product*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/product/')}}"  >
											<i class="fa fa-cube" aria-hidden="true"></i>
											<span>สินค้า</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/option_product*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/option_product/')}}"  >
											<i class="fa fa-filter" aria-hidden="true"></i>
											<span>Option สินค้า</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/order*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/order/')}}"  >
											<i class="fa fa-copy" aria-hidden="true"></i>
											<span>Order สินค้า</span>
										</a>
									</li>


                  <li {{ (Request::is('admin/coupon*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/coupon/')}}"  >
											<i class="fa fa-usd" aria-hidden="true"></i>
											<span>Coupon</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/bank*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/bank/')}}" >
											<i class="fa fa-bank" aria-hidden="true"></i>
											<span>ธนาคาร</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/slide*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/slide/')}}"  >
											<i class="fa fa-camera" aria-hidden="true"></i>
											<span>Slide Show</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/b_category*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/b_category/')}}"  >
											<i class="fa fa-tasks" aria-hidden="true"></i>
											<span>หมวดหมู่ blog</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/blog*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/blog/')}}"  >
											<i class="fa fa-leaf" aria-hidden="true"></i>
											<span>blog</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/subscribe*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/subscribe/')}}"  >
											<i class="fa fa-asterisk" aria-hidden="true"></i>
											<span>Subscribe</span>
										</a>
									</li>


                  <li {{ (Request::is('admin/contact_admin*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/contact_admin/')}}"  >
											<i class="fa fa-envelope-o" aria-hidden="true"></i>
											<span>จัดการข้อความ</span>
										</a>
									</li>






								</ul>



							</nav>



							<hr class="separator" />


						</div>

					</div>

				</aside>
				<!-- end: sidebar -->
