<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
/** All Paypal Details class **/
use Illuminate\Support\Facades\DB;
use PayPal\Api\ItemList;
use App\order;
use App\confirm_payment;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;

class PaymentController extends Controller
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function get_pay_info(){

      $cat = DB::table('confirm_payments')->select(
            'confirm_payments.*',
            'confirm_payments.id as ids',
            'banks.*'
            )
            ->leftjoin('banks', 'banks.id',  'confirm_payments.bank')
            ->get();

            $data['objs'] = $cat;
            $data['datahead'] = "แจ้งการชำระเงิน";
            return view('admin.get_pay_info.index', $data);
    }

    public function edit_pay_info($id){

      $cat = DB::table('confirm_payments')->select(
            'confirm_payments.*',
            'confirm_payments.id as ids',
            'banks.*'
            )
            ->leftjoin('banks', 'banks.id',  'confirm_payments.bank')
            ->where('confirm_payments.id', $id)
            ->first();

            $data['objs'] = $cat;

          $data['datahead'] = "แจ้งการชำระเงิน";
          return view('admin.get_pay_info.edit', $data);
    }

    public function uodate_pay_user(Request $request){

      $id = $request['id'];
      $package = confirm_payment::find($id);
      $package->note = $request['note_detail'];
      $package->confirm_status = $request['confirm_status'];
      $package->save();

      return redirect(url('admin/edit_pay_info/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    public function payWithpaypal(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();

        \Session::put('id_order_pay', $request->get('id_order'));


        $item_1->setName('หมายเลขสั่งซื้อสินค้า '.$request->get('id_order')) /** item name **/
            ->setCurrency('THB')
            ->setQuantity(1)
            ->setPrice($request->get('amount')); /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('THB')
            ->setTotal($request->get('amount'));
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('หมายเลขสั่งซื้อสินค้า '.$request->get('id_order'));
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status')) /** Specify return URL **/
            ->setCancelUrl(URL::to('status'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');
                return Redirect::to('/');
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::to('/');
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
        return Redirect::to('/');
    }
    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('error', 'Payment failed');


            return Redirect::to('/paypal_error');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {
            \Session::put('success', 'Payment success');

            //\Session::put('paypal_payment_id', $payment_id);

            $id = \Session::get('id_order_pay');
            Session::forget('id_order_pay');
            $package = order::find($id);
            $package->paypal_status = 1;
            $package->save();

            return Redirect::to('/paypal_success');
        }
        \Session::put('error', 'Payment failed');
        return Redirect::to('/');
    }
}
