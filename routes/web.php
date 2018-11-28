<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::auth();

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/product/{id}', 'HomeController@product')->name('product');
Route::get('/cart', 'HomeController@cart')->name('cart');
Route::post('add_cart', 'HomeController@add_cart')->name('add_cart');
Route::get('del_cart/{id}', 'HomeController@del_cart')->name('del_cart');
Route::get('blog/{id}', 'HomeController@blog')->name('blog');
Route::get('category_blog/{id}', 'HomeController@category_blog')->name('category_blog');
Route::get('get_blog', 'HomeController@get_blog')->name('blog');
Route::post('/add_contact', 'HomeController@add_contact');

Route::get('/contact_success', 'HomeController@contact_success');

Route::get('/paypal_success', 'HomeController@paypal_success');


Route::get('category/{id}', 'HomeController@category')->name('category');
Route::get('clear_cart', 'HomeController@clear_cart')->name('clear_cart');
Route::get('about', 'HomeController@about')->name('about');
Route::get('contact', 'HomeController@contact')->name('contact');
Route::post('update_cart', 'HomeController@update_cart')->name('update_cart');
Route::post('/post_coupon','HomeController@post_coupon');
Route::post('/post_subscribe','HomeController@post_subscribe');

Route::get('/payment_option', 'HomeController@payment_option');
Route::get('/term_of_service', 'HomeController@term_of_service');
Route::get('/return_policy', 'HomeController@return_policy');
Route::get('/privacy_policy', 'HomeController@privacy_policy');
Route::get('/delivery_information', 'HomeController@delivery_information');
Route::get('/confirm_payment', 'HomeController@confirm_payment');

Route::post('/confirm_payment_update','HomeController@confirm_payment_update');

Route::post('paypal', 'PaymentController@payWithpaypal')->name('payWithpaypal');
Route::get('status', 'PaymentController@getPaymentStatus');



// Social Auth del_cart

Route::get('oauth/{driver}', 'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');

Route::group(['middleware' => 'auth'], function () {
  Route::get('/user_profile', 'HomeController@user_profile');
  Route::post('/user_profile_update', 'HomeController@user_profile_update');

  Route::get('my_order', 'HomeController@my_order');

  Route::get('checkout', 'HomeController@checkout')->name('checkout');
  Route::post('add_shipping', 'HomeController@add_shipping')->name('add_shipping');
  Route::get('payment/{id}', 'HomeController@payment')->name('payment');

  });


Route::group(['middleware' => 'admin'], function() {

  Route::resource('admin/bank', 'BankController');
  Route::get('admin/dashboard', 'DashboardController@index')->name('dashboard');
  Route::resource('admin/user', 'StudentController');
  Route::resource('admin/option_product', 'Option_productController');
  Route::post('admin/option_product_item/', 'Option_productController@option_product_item');
  Route::post('admin/option_product_item_edit/{id}', 'Option_productController@option_product_item_edit');
  Route::post('admin/option_product_item_del/{id}', 'Option_productController@option_product_item_del');
  Route::resource('admin/product', 'ProductController');
  Route::resource('admin/category', 'CategoryController');
  Route::get('admin/product_gallery/{id}', 'ProductController@product_gallery');
  Route::post('admin/add_gallery/', 'ProductController@add_gallery');
  Route::post('property_image_del', 'ProductController@property_image_del');
  Route::post('api/api_post_status', 'ProductController@api_post_status');
  Route::resource('admin/order', 'OrderController');
  Route::post('api/api_order_status', 'OrderController@api_order_status');
  Route::resource('admin/coupon', 'CouponController');
  Route::resource('admin/slide', 'SlideController');
  Route::resource('admin/subscribe', 'SubscribeController');
  Route::post('api/api_slide_status', 'SlideController@api_slide_status');
  Route::resource('admin/b_category', 'BlogCatController');
  Route::resource('admin/blog', 'BlogController');
  Route::post('api/api_blog_status', 'BlogController@api_blog_status');
  Route::post('admin/file/posts', 'BlogController@imagess');

  });
