<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\order;
use App\product;
use App\order_detail;
use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cat = DB::table('orders')->select(
              'orders.*'
              )
              ->orderBy('id', 'DESC')
              ->paginate(15);

              $data['objs'] = $cat;
              $data['datahead'] = "order สั่งสินค้า";
              return view('admin.order.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function api_order_status(Request $request){

     $user = order::findOrFail($request->user_id);

               if($user->order_status == 1){
                   $user->order_status = 0;
               } else {
                   $user->order_status = 1;
               }


       return response()->json([
       'data' => [
         'success' => $user->save(),
       ]
     ]);

     }



    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $cat = DB::table('orders')->select(
              'orders.*'
              )
              ->where('id', $id)
              ->first();

              $order = DB::table('order_details')->select(
                    'order_details.*',
                    'products.*',
                    'products.id as id_p'
                    )
                    ->leftjoin('products', 'products.id',  'order_details.product_id')
                    ->where('order_details.order_id', $id)
                    ->get();

                    foreach($order as $k){

                      if($k->size != 0){

                        $get_size = DB::table('option_items')
                        ->where('id', $k->size)
                        ->first();

                        $k->get_size = $get_size->item_name;

                        $get_color = DB::table('option_items')
                        ->where('id', $k->color)
                        ->first();

                        $k->get_color = $get_color->item_name;

                      }else{
                        $k->get_size = null;
                        $k->get_color = null;

                      }

                    }



                    $confirm = DB::table('confirm_payments')
                    ->where('order_id', $id)
                    ->first();

                    if($confirm != null){

                      $bank= DB::table('banks')
                      ->where('id', $confirm->bank)
                      ->first();

                    }else{
                      $bank = null;
                    }


        //dd($order);


        $data['bank'] = $bank;
        $data['confirm'] = $confirm;
        $data['order'] = $order;
        $data['objs'] = $cat;
        $data['confirm'] = $confirm;
        $data['datahead'] = "แก้ไขข้อมูลสั่งสินค้า";
        $data['url'] = url('admin/order/'.$id);
        $data['method'] = "put";

      return view('admin.order.edit', $data);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $success_order = $request['order_status_show'];
        $ems_tracking_email = $request['ems_tracking_email'];

      //  dd($ems_tracking_email);
        $package = order::find($id);
        $package->order_status_show = $request['order_status_show'];
        $package->ems_tracking = $request['ems_tracking'];
        $package->note = $request['note'];
        $package->save();
        $sum = 0;


        $get_order = DB::table('orders')->select(
              'orders.*'
              )
              ->where('id', $id)
              ->first();


          //    dd($get_order);



        if($success_order == 1){

          $order = DB::table('order_details')->select(
                'order_details.*',
                'order_details.id as id_prderx',
                'products.*',
                'products.id as id_p'
                )
                ->leftjoin('products', 'products.id',  'order_details.product_id')
                ->where('order_details.order_id', $id)
                ->where('order_details.order_d_status', 0)
                ->get();

                foreach($order as $u){

                  $product = DB::table('products')
                        ->where('id', $u->product_id)
                        ->first();

                  $sum = $product->total_product - $u->sum_item;

                    $package = product::find($u->product_id);
                    $package->total_product = $sum;
                    $package->save();

                    $package = order_detail::find($u->id_prderx);
                    $package->order_d_status = 1;
                    $package->save();


                }







                date_default_timezone_set("Asia/Bangkok");
                $data_date = date("Y-m-d H:i:s");


                // send email
                     $data_toview = array();
                   //  $data_toview['pathToImage'] = "assets/image/email-head.jpg";

                   date_default_timezone_set("Asia/Bangkok");

                   $data_toview['data'] = $get_order;
                   $data_toview['datatime'] = date("d-m-Y H:i:s");

                     $email_sender   = 'fulryumail@gmail.com';
                     $email_pass     = 'aeychingking';

                 /*    $email_sender   = 'info@acmeinvestor.com';
                     $email_pass     = 'Iaminfoacmeinvestor';  */
                     $email_to       =  $ems_tracking_email;
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
                                 $data['sender'] = $email_to;
                                 //Sender dan Reply harus sama


                                 Mail::send('mail.ems_tracking', $data_toview, function($message) use ($data)
                                 {
                                     $message->from($data['sender'], 'fulryu แจ้งการส่งสินค้า');
                                     $message->to($data['emailto'])
                                     ->replyTo($data['sender'], 'fulryu แจ้งการส่งสินค้า.')
                                     ->subject('แจ้งการส่งสินค้า fulryu');

                                     //echo 'Confirmation email after registration is completed.';
                                 });

                     }catch(\Swift_TransportException $e){
                         $response = $e->getMessage() ;
                         echo $response;

                     }


                     // Restore your original mailer
                     Mail::setSwiftMailer($backup);
                     // send email








              //  dd($sum);

        }

        return redirect(url('admin/order/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
