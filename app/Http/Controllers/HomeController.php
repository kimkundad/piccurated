<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;
use App\blog;
use App\User;
use App\order;
use App\order_detail;
use App\coupon_user;
use App\subscribe;
use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;
use App\comtact;
use App\confirm_payment;
use Intervention\Image\ImageManagerStatic as Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $obj1 = DB::table('categories')->select(
            'categories.*',
            'categories.id as cat_id'
            )
            ->get();

            foreach($obj1 as $u){
              $options = DB::table('products')
                ->where('pro_category', $u->id)
                ->limit(2)
                ->get();
              $u->options = $options;
            }
            $data['cat1'] = $obj1;

            //  dd($obj1);

            $blog_new = DB::table('blogs')->select(
                  'blogs.*'
                  )
                  ->where('blogs.blog_status', 1)
                  ->limit(6)
                  ->get();



            $cat_new = DB::table('products')->select(
                  'products.*',
                  'products.id as id_p'
                  )
                  ->where('products.pro_status_show', 2)
                  ->where('products.pro_status', 1)
                  ->limit(3)
                  ->get();

                  $cat_rec = DB::table('products')->select(
                        'products.*',
                        'products.id as id_p'
                        )
                        ->where('products.pro_status_show', 4)
                        ->where('products.pro_status', 1)
                        ->limit(8)
                        ->get();



      $data['objs_new'] = $cat_new;
      $data['objs_rec'] = $cat_rec;
      $data['blog_new'] = $blog_new;


      $slide = DB::table('slide_shows')->select(
            'slide_shows.*'
            )
            ->where('slide_status', 1)
            ->get();
      $data['slide'] = $slide;


      return view('welcome', $data);
    }


    public function delivery_information(){

      $obj1 = DB::table('categories')->select(
            'categories.*'
            )
            ->get();

            foreach($obj1 as $u){
              $options = DB::table('products')
                ->where('pro_category', $u->id)
                ->limit(2)
                ->get();
              $u->options = $options;
            }
            $data['cat1'] = $obj1;

      return view('delivery_information', $data);
    }

    public function term_of_service(){

      $obj1 = DB::table('categories')->select(
            'categories.*'
            )
            ->get();

            foreach($obj1 as $u){
              $options = DB::table('products')
                ->where('pro_category', $u->id)
                ->limit(2)
                ->get();
              $u->options = $options;
            }
            $data['cat1'] = $obj1;

      return view('term_of_service', $data);

    }

    public function payment_option(){

      $bank = DB::table('banks')
          ->get();

      $data['bank'] = $bank;

      $obj1 = DB::table('categories')->select(
            'categories.*'
            )
            ->get();

            foreach($obj1 as $u){
              $options = DB::table('products')
                ->where('pro_category', $u->id)
                ->limit(2)
                ->get();
              $u->options = $options;
            }
            $data['cat1'] = $obj1;

      return view('payment_option', $data);

    }


    public function user_profile(){

      $obj1 = DB::table('categories')->select(
            'categories.*'
            )
            ->get();

            foreach($obj1 as $u){
              $options = DB::table('products')
                ->where('pro_category', $u->id)
                ->limit(2)
                ->get();
              $u->options = $options;
            }
            $data['cat1'] = $obj1;

      return view('user_profile', $data);

    }

    public function my_order(){

      $obj1 = DB::table('categories')->select(
            'categories.*'
            )
            ->get();

            foreach($obj1 as $u){
              $options = DB::table('products')
                ->where('pro_category', $u->id)
                ->limit(2)
                ->get();
              $u->options = $options;
            }
            $data['cat1'] = $obj1;


            $order = DB::table('orders')->select(
                  'orders.*'
                  )
                  ->where('user_id', Auth::user()->id)
                  ->get();

                  foreach($order as $u){

                    $options = DB::table('order_details')->select(
                          'order_details.*',
                          'products.*'
                          )
                          ->leftjoin('products', 'products.id',  'order_details.product_id')
                          ->where('order_details.order_id', $u->id)
                          ->get();
                    $u->option = $options;

                  }
                  $data['order'] = $order;
                //  dd($order);

      return view('my_order', $data);

    }



    public function confirm_payment(){

      $bank = DB::table('banks')
          ->get();

      $data['bank'] = $bank;

      $obj1 = DB::table('categories')->select(
            'categories.*'
            )
            ->get();

            foreach($obj1 as $u){
              $options = DB::table('products')
                ->where('pro_category', $u->id)
                ->limit(2)
                ->get();
              $u->options = $options;
            }
            $data['cat1'] = $obj1;

      return view('confirm_payment', $data);

    }


    public function user_profile_update(Request $request){

      $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);

        $id=Auth::user()->id;
        $package = User::find($id);
        $package->name = $request['name'];
        $package->email = $request['email'];
        $package->phone = $request['phone'];
        $package->birthday = $request['hbd'];
        $package->address = $request['address'];
        $package->save();



        return redirect(url('user_profile'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }


    public function return_policy(){

      $obj1 = DB::table('categories')->select(
            'categories.*'
            )
            ->get();

            foreach($obj1 as $u){
              $options = DB::table('products')
                ->where('pro_category', $u->id)
                ->limit(2)
                ->get();
              $u->options = $options;
            }
            $data['cat1'] = $obj1;

      return view('return_policy', $data);

    }


    public function paypal_success(){

      $obj1 = DB::table('categories')->select(
            'categories.*'
            )
            ->get();

            foreach($obj1 as $u){
              $options = DB::table('products')
                ->where('pro_category', $u->id)
                ->limit(2)
                ->get();
              $u->options = $options;
            }
            $data['cat1'] = $obj1;

      return view('paypal_success', $data);

    }


    public function privacy_policy(){


      $obj1 = DB::table('categories')->select(
            'categories.*'
            )
            ->get();

            foreach($obj1 as $u){
              $options = DB::table('products')
                ->where('pro_category', $u->id)
                ->limit(2)
                ->get();
              $u->options = $options;
            }
            $data['cat1'] = $obj1;

      return view('privacypolicy', $data);

    }


    public function get_blog(){

      $obj1 = DB::table('categories')->select(
            'categories.*'
            )
            ->get();

            foreach($obj1 as $u){
              $options = DB::table('products')
                ->where('pro_category', $u->id)
                ->limit(2)
                ->get();
              $u->options = $options;
            }
      $data['cat1'] = $obj1;

      $blog = DB::table('blogs')
      ->select(
      'blogs.*'
      )
      ->orderBy('id', 'desc')
      ->paginate(9);

      $data['blog'] = $blog;

      return view('get_blog', $data);
    }

    public function category_blog($id){

      $obj1 = DB::table('categories')->select(
            'categories.*'
            )
            ->get();

            foreach($obj1 as $u){
              $options = DB::table('products')
                ->where('pro_category', $u->id)
                ->limit(2)
                ->get();
              $u->options = $options;
            }
      $data['cat1'] = $obj1;

      $blog = DB::table('blogs')
      ->select(
      'blogs.*'
      )
      ->where('blog_cat', $id)
      ->orderBy('id', 'desc')
      ->paginate(9);

      $data['blog'] = $blog;


      return view('category_blog', $data);
    }


    public function blog($id){

      $package = blog::find($id);
      $package->blog_view += 1;
      $package->save();

      $obj1 = DB::table('categories')->select(
            'categories.*'
            )
            ->get();

            foreach($obj1 as $u){
              $options = DB::table('products')
                ->where('pro_category', $u->id)
                ->limit(2)
                ->get();
              $u->options = $options;
            }
      $data['cat1'] = $obj1;

      $product_count = DB::table('blog_products')->select(
            'blog_products.*'
            )
            ->where('blog_id', $id)
            ->count();


      $product = DB::table('blog_products')->select(
            'blog_products.*'
            )
            ->where('blog_id', $id)
            ->get();
      foreach($product as $p){

        $option_pro = DB::table('products')->select(
              'products.*'
              )
              ->where('id', $p->product_id)
              ->first();
      $p->option_pro = $option_pro;
      }

      $blog_cat = DB::table('category_blogs')
            ->get();

      foreach($blog_cat as $u){

        $blog_get = DB::table('blogs')->select(
              'blogs.*'
              )
              ->where('blog_cat', $u->id)
              ->count();
        $u->count_blog = $blog_get;
      }

      $blog_product_set = DB::table('blogs')->select(
            'blogs.*'
            )
            ->where('blogs.id', $id)
            ->first();



            $get_product_show = DB::table('products')->select(
                  'products.*'
                  )
                  ->where('id', $blog_product_set->set_product)
                  ->first();

        //    dd($blog_new->set_product);
      $data['get_product_show'] = $get_product_show;

      $home_list = DB::table('blogs')
      ->select(
      'blogs.*'
      )
      ->where('id', '!=', $id)
      ->orderBy('created_at', 'desc')
      ->limit(6)
      ->get();
      //dd($product);
      $data['product_count'] = $product_count;
      $data['home_list'] = $home_list;
      $data['product'] = $product;
      $data['blog_cat'] = $blog_cat;
      $data['blog_new'] = $blog_product_set;
      return view('blog_detail', $data);
    }

    public function del_cart($id){

      session()->forget(['cart.'.$id]);
      return redirect(url('cart'))->with('success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }


    public function clear_cart(){
      session()->forget(['cart']);
      return redirect()->back()->with('success', 'เพิ่มสินค้าสำเร็จ');
    }

    public function contact_success(){

      $obj1 = DB::table('categories')->select(
            'categories.*'
            )
            ->get();

            foreach($obj1 as $u){
              $options = DB::table('products')
                ->where('pro_category', $u->id)
                ->limit(2)
                ->get();
              $u->options = $options;
            }
      $data['cat1'] = $obj1;

      return view('contact_success', $data);
    }


    public function add_contact(Request $request){

      $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => 'required'
        ]);
        $token = $request->input('g-recaptcha-response');
      //  dd($token);
        if ($token) {


          $package = new comtact();
          $package->name = $request['name'];
          $package->email = $request['email'];
          $package->message = $request['message'];
          $package->save();

          $the_id = $package->id;

          $packages = DB::table('comtacts')
              ->select(
              'comtacts.*'
              )
              ->where('id', $the_id)
              ->first();


        //  dd($packages);

          // send email
            $data_toview = array();
          //  $data_toview['pathToImage'] = "assets/image/email-head.jpg";
            date_default_timezone_set("Asia/Bangkok");
            $data_toview['name'] = $packages->name;
            $data_toview['email'] = $packages->email;
            $data_toview['messagess'] = $packages->message;

            $data_toview['datatime'] = date("d-m-Y H:i:s");

            $email_sender   = 'fulryumail@gmail.com';
            $email_pass     = 'aeychingking';

        /*    $email_sender   = 'info@acmeinvestor.com';
            $email_pass     = 'Iaminfoacmeinvestor';  */
          //  $email_to       =  'siri@sirispace.com';
          $email_to       =  'fulryumail@gmail.com';
            //echo $admins[$idx]['email'];
            // Backup your default mailer
            $backup = \Mail::getSwiftMailer();

            try{

                        //https://accounts.google.com/DisplayUnlockCaptcha
                        // Setup your gmail mailer
                        $transport = new \Swift_SmtpTransport('smtp.gmail.com', 465, 'SSL');
                        $transport->setUsername($email_sender);
                        $transport->setPassword($email_pass);

                        // Any other mailer configuration stuff needed...
                        $gmail = new Swift_Mailer($transport);

                        // Set the mailer as gmail
                        \Mail::setSwiftMailer($gmail);

                        $data['emailto'] = $email_to;

                        //dd($data['emailto']);
                        $data['sender'] = $email_sender;
                        //Sender dan Reply harus sama

                        Mail::send('mail.contact', $data_toview, function($message) use ($data)
                        {
                            $message->from($data['sender'], 'มีข้อความจาก fulryu');
                            $message->to($data['emailto'])
                            ->replyTo($data['emailto'], 'มีข้อความจาก fulryu.')
                            ->subject('มีข้อความจาก fulryu.com เข้าสู่ะบบ');

                            //echo 'Confirmation email after registration is completed.';
                        });



            }catch(\Swift_TransportException $e){
                $response = $e->getMessage() ;
                echo $response;

            }


            // Restore your original mailer
            Mail::setSwiftMailer($backup);
            // send email







          return redirect(url('contact_success'));

        } else {
        echo "No";
      }

    }

    public function post_subscribe(Request $request){

      $this->validate($request, [
           'email' => 'required'
       ]);

       $count_sub = DB::table('subscribes')->select(
             'subscribes.*'
             )
             ->where('email', $request['email'])
             ->count();

       if($count_sub == 0){

         $package = new subscribe();
         $package->email = $request['email'];
         $package->save();

         $response = array(
             'status' => 'success',
             'msg' => 'ขอบคุณที่ Subscribe เว็บไซต์ของเรา',
         );

       }else{

         $response = array(
             'status' => 'success',
             'msg' => 'Email ของคุณอยู่ในระบบแล้ว',
         );

       }






return response()->json($response);




    }

    public function post_coupon(Request $request){



      $get_coupon_count = DB::table('coupons')
          ->select(
          'coupons.*'
          )
          ->where('c_code', $request->coupon)
          ->count();

          $get_coupon = DB::table('coupons')
              ->select(
              'coupons.*'
              )
              ->where('c_code', $request->coupon)
              ->first();



          if($get_coupon_count > 0){


            if($request->max_price >= $get_coupon->c_price_product){


              $get_coupons = DB::table('coupons')
                  ->select(
                  'coupons.*'
                  )
                  ->where('c_code', $request->coupon)
                  ->first();

              Session::put('coupon', ['code' => $get_coupon->c_code, 'id' => $get_coupon->id, 'price' => $get_coupon->c_price]);

              $response = array(
                  'status' => 'success',
                  'msg' => 'คุณสามารถใช้ Coupon นี้ได้',
              );


            }else{

              $response = array(
                  'status' => 'error',
                  'msg' => 'คุณไม่สามารถใช้ Coupon นี้ได้ ยอดสั่งซื้อ ไม่ตรงกับที่ระบุไว้',
              );

            }



          }else{

            $response = array(
                'status' => 'error',
                'msg' => 'คุณไม่สามารถใช้ Coupon นี้ได้',
            );

          }


    //  dd($get_coupon_count);



      return response()->json($response);
    }


    public function category(Request $request, $id){

      $Sort_by = $request['Sort_by'];

    //  dd($Sort_by);

      $obj1 = DB::table('categories')->select(
            'categories.*'
            )
            ->get();

            foreach($obj1 as $u){
              $options = DB::table('products')
                ->where('pro_category', $u->id)
                ->limit(2)
                ->get();
              $u->options = $options;

              $get_count = DB::table('products')->select(
                    'products.*'
                    )
                    ->where('pro_category', $u->id)
                    ->count();
            $u->count = $get_count;

            }
      $data['cat1'] = $obj1;

    //  dd($obj1);



      $category = DB::table('categories')->select(
            'categories.*'
            )
            ->where('id', $id)
            ->first();

            $category_count = DB::table('products')->select(
                  'products.*'
                  )
                  ->where('pro_category', $category->id)
                  ->count();

            if($Sort_by == null){
              $sort_set = 1;
              $product = DB::table('products')
                ->where('pro_category', $category->id)
                ->orderBy('pro_name', 'asc')
                ->paginate(16);
            }else{


              if($Sort_by == 'p-name'){
                $sort_set = 1;

                $product = DB::table('products')
                  ->where('pro_category', $category->id)
                  ->orderBy('pro_name', 'asc')
                  ->paginate(16);

              }else{
                $sort_set = 2;

                $product = DB::table('products')
                  ->where('pro_category', $category->id)
                  ->orderBy('pro_price', 'asc')
                  ->paginate(16);

              }

            }

      $data['sort_set'] = $sort_set;

      $data['category_count'] = $category_count;
      $data['category'] = $category;
      $data['product'] = $product;

      $hot = DB::table('products')->select(
            'products.*'
            )
            ->where('pro_category', $category->id)
            ->limit(4)
            ->orderBy('views', 'desc')
            ->get();
      $data['hot'] = $hot;



      return view('category', $data);
    }




    public function about(){
      $obj1 = DB::table('categories')->select(
            'categories.*'
            )
            ->get();

            foreach($obj1 as $u){
              $options = DB::table('products')
                ->where('pro_category', $u->id)
                ->limit(2)
                ->get();
              $u->options = $options;
            }
      $data['cat1'] = $obj1;



      return view('about', $data);
    //  return response()->file($urlpath);
    }

    public function contact(){

      $obj1 = DB::table('categories')->select(
            'categories.*'
            )
            ->get();

            foreach($obj1 as $u){
              $options = DB::table('products')
                ->where('pro_category', $u->id)
                ->limit(2)
                ->get();
              $u->options = $options;
            }
      $data['cat1'] = $obj1;

      return view('contact', $data);
    }



    public function cart(){

    //  dd(Session::get('cart'));

      $obj1 = DB::table('categories')->select(
            'categories.*'
            )
            ->get();

            foreach($obj1 as $u){
              $options = DB::table('products')
                ->where('pro_category', $u->id)
                ->limit(2)
                ->get();
              $u->options = $options;
            }
      $data['cat1'] = $obj1;

    //session()->forget(['coupon']);

      $set_num_date = count(Session::get('cart'));
      if($set_num_date == 0){
        return redirect('/');
      }else{
        Session::put('status_user', 1);
      }

      return view('cart', $data);
    }

    public function checkout(){



      $set_cart = count(Session::get('cart'));
      if($set_cart == 0){
        return redirect('/');
      }else{

      //  dd(Session::get('cart'));

        $total = 0;
        $total_item = 0;
        $sum_weight = 0;
        $price_s = 0;

        foreach(Session::get('cart') as $u){

          $product = DB::table('products')->select(
            'products.*'
            )
            ->where('products.id', $u['data']['id'])
            ->first();


          $sum_weight += ($product->pro_weight * $u['data'][1]['sum_item']);

          $shipping_price = ($product->pro_weight * $u['data'][1]['sum_item']);

          if($shipping_price < 20){
                  $price_s = 20;
                }elseif($shipping_price > 20 && $shipping_price < 100){
                  $price_s = 25;
                }elseif($shipping_price > 100 && $shipping_price < 250){
                  $price_s = 30.00;
                }elseif($shipping_price > 250 && $shipping_price < 500){
                  $price_s = 40.00;
                }elseif($shipping_price > 500 && $shipping_price < 1000){
                  $price_s = 55.00;
                }elseif($shipping_price > 1000 && $shipping_price < 1500){
                  $price_s = 70.00;
                }elseif($shipping_price > 1500 && $shipping_price < 2000){
                  $price_s = 85.00;
                }elseif($shipping_price > 2000 && $shipping_price < 2500){
                  $price_s = 100.00;
                }elseif($shipping_price > 2500 && $shipping_price < 3000){
                  $price_s = 115.00;
                }elseif($shipping_price > 3000 && $shipping_price < 3500){
                  $price_s = 135.00;
                }elseif($shipping_price > 3500 && $shipping_price < 4000){
                  $price_s = 155;
                }elseif($shipping_price > 4000 && $shipping_price < 4500){
                  $price_s = 175;
                }elseif($shipping_price > 4500 && $shipping_price < 5000){
                  $price_s = 200;
                }elseif($shipping_price > 5000 && $shipping_price < 5500){
                  $price_s = 220;
                }elseif($shipping_price > 5500 && $shipping_price < 6000){
                  $price_s = 245;
                }elseif($shipping_price > 6000 && $shipping_price < 6500){
                  $price_s = 270;
                }elseif($shipping_price > 6500 && $shipping_price < 7000){
                  $price_s = 295;
                }elseif($shipping_price > 7000 && $shipping_price < 7500){
                  $price_s = 320;
                }elseif($shipping_price > 7500 && $shipping_price < 8000){
                  $price_s = 345;
                }elseif($shipping_price > 8000 && $shipping_price < 8500){
                  $price_s = 375;
                }elseif($shipping_price > 8500 && $shipping_price < 9000){
                  $price_s = 405;
                }elseif($shipping_price > 9000 && $shipping_price < 9500){
                  $price_s = 435;
                }elseif($shipping_price > 9500 && $shipping_price < 10000){
                  $price_s = 465;
                }else{

                }




          $total += $u['data'][2]['sum_price'];
        //  $total_sum = $u['data']['price']*$u['data'][1]['sum_item'];
          $total_item += $u['data'][1]['sum_item'];


        }

        $size = $u['data']['size'];
        $color = $u['data']['color'];

        if($size != null && $color != null){


          $get_name_size = DB::table('option_items')->select(
            'option_items.*'
            )
            ->where('id', $size)
            ->first();


            $get_name_color = DB::table('option_items')->select(
              'option_items.*'
              )
              ->where('id', $color)
              ->first();

              $size = $get_name_size->item_name;
              $color = $get_name_color->item_name;

              $size1 = $get_name_size->id;
              $color1 = $get_name_color->id;



        }elseif($size == null && $color != null){




            $get_name_color = DB::table('option_items')->select(
              'option_items.*'
              )
              ->where('id', $color)
              ->first();

              $size = 0;
              $color = $get_name_color->item_name;

              $size1 = 0;
              $color1 = $get_name_color->id;

        }elseif($size != null && $color == null){

          $get_name_size = DB::table('option_items')->select(
            'option_items.*'
            )
            ->where('id', $size)
            ->first();




              $size = $get_name_size->item_name;
              $color = 0;

              $size1 = $get_name_size->id;
              $color1 = 0;

        }else{

          $size = 0;
          $color = 0;
          $size1 = 0;
          $color1 = 0;

        }

        $total_price = $total+$price_s;
        $data['sum_weight'] = $sum_weight;
        $data['price_s'] = $price_s;
        $data['total_price'] = $total_price;
        $data['total'] = $total;
        $data['num_order'] = $set_cart;
      //  dd($size);
        $data['size'] = $size;
        $data['color'] = $color;
        $data['size1'] = $size1;
        $data['color1'] = $color1;


      }

      $obj1 = DB::table('categories')->select(
            'categories.*'
            )
            ->get();

            foreach($obj1 as $u){
              $options = DB::table('products')
                ->where('pro_category', $u->id)
                ->limit(2)
                ->get();
              $u->options = $options;
            }
      $data['cat1'] = $obj1;


      return view('checkout', $data);
    }


    public function confirm_payment_update(Request $request){

      $image = $request->file('slip_image');
      $this->validate($request, [
           'slip_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           'name' => 'required',
           'phone' => 'required',
           'email' => 'required',
           'order_id' => 'required',
           'money' => 'required',
           'bank' => 'required',
           'date_transfer' => 'required'
       ]);

       $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

       $destinationPath = asset('assets/image/slip_image/');
       $img = Image::make($image->getRealPath());
       $img->resize(800, 533, function ($constraint) {
       $constraint->aspectRatio();
     })->save('assets/image/slip_image/'.$input['imagename']);


     $package = new confirm_payment();
     $package->name = $request['name'];
     $package->phone = $request['phone'];
     $package->email = $request['email'];
     $package->order_id = $request['order_id'];
     $package->money = $request['money'];
     $package->bank = $request['bank'];
     $package->date_transfer = $request['date_transfer'];
     $package->time_transfer = $request['time_transfer'];
     $package->note = $request['note'];
     $package->slip_image = $input['imagename'];
     $package->save();

     $the_id = $package->id;






     date_default_timezone_set("Asia/Bangkok");
     $data_date = date("Y-m-d H:i:s");


     // send email
          $data_toview = array();
        //  $data_toview['pathToImage'] = "assets/image/email-head.jpg";

        date_default_timezone_set("Asia/Bangkok");

        $data_toview['data'] = $package;
        $data_toview['datatime'] = date("d-m-Y H:i:s");

          $email_sender   = 'fulryumail@gmail.com';
          $email_pass     = 'aeychingking';

      /*    $email_sender   = 'info@acmeinvestor.com';
          $email_pass     = 'Iaminfoacmeinvestor';  */
          $email_to       =  $request['email'];
          //echo $admins[$idx]['email'];
          // Backup your default mailer
          $backup = \Mail::getSwiftMailer();

          try{

                      //https://accounts.google.com/DisplayUnlockCaptcha
                      // Setup your gmail mailer
                      $transport = new \Swift_SmtpTransport('smtp.gmail.com', 465, 'SSL');
                      $transport->setUsername($email_sender);
                      $transport->setPassword($email_pass);

                      // Any other mailer configuration stuff needed...
                      $gmail = new Swift_Mailer($transport);

                      // Set the mailer as gmail
                      \Mail::setSwiftMailer($gmail);

                      $data['emailto'] = $email_sender;
                      $data['sender'] = $email_to;
                      //Sender dan Reply harus sama

                      Mail::send('mail.confirm_payment_admin', $data_toview, function($message) use ($data)
                      {
                          $message->from($data['sender'], 'fulryu แจ้งการโอนเงิน');
                          $message->to($data['sender'])
                          ->replyTo($data['sender'], 'fulryu แจ้งการโอนเงิน.')
                          ->subject('แจ้งการโอนเงิน fulryu ');

                          //echo 'Confirmation email after registration is completed.';
                      });


                      Mail::send('mail.confirm_payment_customer', $data_toview, function($message) use ($data)
                      {
                          $message->from($data['sender'], 'fulryu แจ้งการโอนเงิน');
                          $message->to($data['emailto'])
                          ->replyTo($data['sender'], 'fulryu แจ้งการโอนเงิน.')
                          ->subject('แจ้งการโอนเงิน fulryu');

                          //echo 'Confirmation email after registration is completed.';
                      });

          }catch(\Swift_TransportException $e){
              $response = $e->getMessage() ;
              echo $response;

          }


          // Restore your original mailer
          Mail::setSwiftMailer($backup);
          // send email




          return redirect(url('contact_success'))->with('send_success','คุณทำการเพิ่มอสังหา สำเร็จ');


    }

    public function add_shipping(Request $request){

      $this->validate($request, [
           'fname' => 'required',
           'lname' => 'required',
           'email' => 'required',
           'address' => 'required',
           'city' => 'required',
           'province' => 'required',
           'zip_code' => 'required',
           'country' => 'required',
           'phone' => 'required',
           'discount' => 'required',
           'total_money' => 'required'
       ]);

       $user = DB::table('users')->select(
         'users.*'
         )
         ->where('users.id', Auth::user()->id)
         ->first();

         if($user->phone == null || $user->address == null){

           DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(
              [
                'address' => $request['address'],
                'phone' => $request['phone'],
                'country' => $request['country'],
                'zipcode' => $request['zip_code'],
                'province' => $request['province']
              ]
            );
         }

       $package = new order();
       $package->fname = $request['fname'];
       $package->user_id = Auth::user()->id;
       $package->lname = $request['lname'];
       $package->company = $request['company'];
       $package->email = $request['email'];
       $package->address = $request['address'];
       $package->city = $request['city'];
       $package->province = $request['province'];
       $package->zip_code = $request['zip_code'];
       $package->country = $request['country'];
       $package->phone = $request['phone'];
       $package->discount = $request['discount'];
       $package->total_money = $request['total_money'];
       $package->order_weight = $request['sum_weight'];
       $package->shipping_price = $request['shipping_price'];
       $package->save();

       $the_id = $package->id;

       if(Session::get('coupon') != null){

         $obj = new coupon_user();
         $obj->c_id = Session::get('coupon.id');
         $obj->user_id = Auth::user()->id;
         $obj->order_id = $the_id;
         $obj->save();

       }




       foreach(Session::get('cart') as $u){

         $product = DB::table('products')->select(
           'products.*'
           )
           ->where('products.id', $u['data']['id'])
           ->first();


         $obj = new order_detail();
         $obj->order_id = $the_id;
         $obj->product_id = $product->id;
         $obj->size = $request['size'];
         $obj->color = $request['color'];
         $obj->product_id = $product->id;
         $obj->product_name = $product->pro_name;
         $obj->sum_item = $u['data'][1]['sum_item'];
         $obj->sum_money = $u['data'][2]['sum_price'];
         $obj->save();

       }


       $order_detail = DB::table('order_details')
              ->select(
              'order_details.*'
              )
              ->where('order_id', $package->id)
              ->get();




       date_default_timezone_set("Asia/Bangkok");
       $data_date = date("Y-m-d H:i:s");


       // send email
            $data_toview = array();
          //  $data_toview['pathToImage'] = "assets/image/email-head.jpg";

          date_default_timezone_set("Asia/Bangkok");
          $data_toview['data_detail'] = $order_detail;
          $data_toview['data'] = $package;
          $data_toview['datatime'] = date("d-m-Y H:i:s");

            $email_sender   = 'fulryumail@gmail.com';
            $email_pass     = 'aeychingking';

        /*    $email_sender   = 'info@acmeinvestor.com';
            $email_pass     = 'Iaminfoacmeinvestor';  */
            $email_to       =  $request['email'];
            //echo $admins[$idx]['email'];
            // Backup your default mailer
            $backup = \Mail::getSwiftMailer();

            try{

                        //https://accounts.google.com/DisplayUnlockCaptcha
                        // Setup your gmail mailer
                        $transport = new \Swift_SmtpTransport('smtp.gmail.com', 465, 'SSL');
                        $transport->setUsername($email_sender);
                        $transport->setPassword($email_pass);

                        // Any other mailer configuration stuff needed...
                        $gmail = new Swift_Mailer($transport);

                        // Set the mailer as gmail
                        \Mail::setSwiftMailer($gmail);

                        $data['emailto'] = $email_sender;
                        $data['sender'] = $email_to;
                        //Sender dan Reply harus sama

                        Mail::send('mail.index', $data_toview, function($message) use ($data)
                        {
                            $message->from($data['sender'], 'fulryu e-commerce');
                            $message->to($data['sender'])
                            ->replyTo($data['sender'], 'fulryu e-commerce.')
                            ->subject('มีรายการใหม่จาก fulryu ');

                            //echo 'Confirmation email after registration is completed.';
                        });


                        Mail::send('mail.index', $data_toview, function($message) use ($data)
                        {
                            $message->from($data['sender'], 'fulryu e-commerce');
                            $message->to($data['emailto'])
                            ->replyTo($data['sender'], 'fulryu e-commerce.')
                            ->subject('คุณได้ทำรายการจาก fulryu');

                            //echo 'Confirmation email after registration is completed.';
                        });

            }catch(\Swift_TransportException $e){
                $response = $e->getMessage() ;
                echo $response;

            }


            // Restore your original mailer
            Mail::setSwiftMailer($backup);
            // send email







       $id = $the_id;

        return redirect(url('payment/'.$id));
    }


    public function payment($id){


      $bank = DB::table('banks')
          ->get();

      $data['bank'] = $bank;

      $obj = DB::table('orders')->select(
            'orders.*'
            )
            ->where('id', $id)
            ->first();

            $objs = DB::table('order_details')->select(
                  'order_details.*'
                  )
                  ->where('order_id', $id)
                  ->get();

                  foreach($objs as $u){

                    $options = DB::table('products')->select(
                          'products.*'
                          )
                          ->where('id', $u->product_id)
                          ->first();

                      $u->options = $options;
                  }


      $data['order_all'] = $objs;
      $data['order'] = $obj;
      $data['id_order'] = $id;
      session()->forget(['cart']);
      session()->forget(['coupon']);

      $obj1 = DB::table('categories')->select(
            'categories.*'
            )
            ->get();

            foreach($obj1 as $u){
              $options = DB::table('products')
                ->where('pro_category', $u->id)
                ->limit(2)
                ->get();
              $u->options = $options;
            }
      $data['cat1'] = $obj1;

      return view('payment', $data);
    }



    public function add_cart(Request $request){

      $this->validate($request, [
           'qty' => 'required',
           'pro_id' => 'required'
       ]);

       $id = $request['pro_id'];

       $size = $request['size'];
       $color = $request['color'];

      $obj = DB::table('products')->select(
            'products.*'
            )
            ->where('id', $id)
            ->first();

        $item = [
          'id' => $obj->id,
          'image' => $obj->pro_image,
          'code' => $obj->pro_code,
          'name' => $obj->pro_name,
          'size' => $size,
          'color' => $color,
          'price' => $obj->pro_price,
          ['status' => 0],
          ['sum_item' => $request['qty']],
          ['sum_price' => $obj->pro_price]
        ];

        Session::put('cart.'.$obj->id, ['data' => $item]);

        $obj1 = DB::table('categories')->select(
              'categories.*'
              )
              ->get();

              foreach($obj1 as $u){
                $options = DB::table('products')
                  ->where('pro_category', $u->id)
                  ->limit(2)
                  ->get();
                $u->options = $options;
              }
        $data['cat1'] = $obj1;

       return view('cart', $data);

    }

    public function update_cart(Request $request){

      $this->validate($request, [
           'qty' => 'required',
           'pro_id' => 'required'
       ]);
       $id = $request['pro_id'];
       $qty = $request['qty'];

       $obj = DB::table('products')->select(
             'products.*'
             )
             ->where('id', $id)
             ->first();

             $total_money_ses= $obj->pro_price * $qty;
          //   dd($total_money_ses)
       session()->put('cart.'.$id.'.data.2', ['sum_price' => $total_money_ses]);
       session()->put('cart.'.$id.'.data.1', ['sum_item' => $qty]);

       $obj1 = DB::table('categories')->select(
             'categories.*'
             )
             ->get();

             foreach($obj1 as $u){
               $options = DB::table('products')
                 ->where('pro_category', $u->id)
                 ->limit(2)
                 ->get();
               $u->options = $options;
             }
       $data['cat1'] = $obj1;

      return view('cart', $data);
    }

    public function product($id){

      $check_option = DB::table('product_items')
        ->where('product_set_id', $id)
        ->count();

      //  dd($check_option);

    if($check_option > 0){

      $get_option = DB::table('product_items')
        ->where('product_set_id', $id)
        ->get();

        foreach ($get_option as $k) {

          $get_option_product = DB::table('option_items')
            ->where('item_option_id', $k->option_set_id)
            ->get();

            $k->get_option_product = $get_option_product;

            $get_option_head = DB::table('option_products')
              ->where('id', $k->option_set_id)
              ->first();

            $k->head_label = $get_option_head->option_name;
            $k->head_var = $get_option_head->option_title;

        }

    }else{

      $get_option = null;

    }

  //  dd($get_option);


  /*  foreach ($option_product as $obj) {

      $options = DB::table('product_items')->select(
          'product_items.*'
          )
          ->where('product_set_id', $id)
          ->where('option_set_id', $obj->id)
          ->count();


      $obj->options = $options;

    }
    $data['option_product'] = $option_product;*/

      $data['get_option'] = $get_option;


      $img_all = DB::table('galleries')->select(
          'galleries.*'
          )
          ->where('pro_id', $id)
          ->get();

          $data['img_all'] = $img_all;

      $cat = DB::table('products')->select(
            'products.*',
            'products.id as id_p',
            'products.created_at as create',
            'categories.*',
            'categories.id as id_c'
            )
            ->leftjoin('categories', 'categories.id',  'products.pro_category')
            ->where('products.id', $id)
            ->first();


            $related = DB::table('products')->select(
                  'products.*',
                  'products.id as id_p'
                  )
                  ->where('products.pro_category', $cat->id_c)
                  ->where('products.pro_status', 1)
                  ->get();


            $data['related'] = $related;
            $obj1 = DB::table('categories')->select(
                  'categories.*'
                  )
                  ->get();

                  foreach($obj1 as $u){
                    $options = DB::table('products')
                      ->where('pro_category', $u->id)
                      ->limit(2)
                      ->get();
                    $u->options = $options;
                  }
            $data['cat1'] = $obj1;
          //  dd($check_option);
            $data['check_option'] = $check_option;
      $data['objs'] = $cat;

      return view('product', $data);
    }
}
