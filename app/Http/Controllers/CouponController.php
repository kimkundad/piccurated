<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\coupon_user;
use App\coupon;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cat = DB::table('coupons')->select(
              'coupons.*'
              )
              ->get();


              foreach ($cat as $obj) {
                  $optionsRes = [];

                      $obj_pro_count = DB::table('coupon_users')->select(
                        'coupon_users.*'
                        )
                        ->where('coupon_users.c_id', $obj->id)
                        ->count();

                  $obj->options = $obj_pro_count;
                }
          //
          $s = 1;
          $data['s'] = $s;
          $data['objs'] = $cat;
          $data['datahead'] = "Coupon";
          return view('admin.coupon.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['method'] = "post";
        $data['url'] = url('admin/coupon');
        $data['datahead'] = "สร้าง Coupon";
        return view('admin.coupon.create', $data);
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
        $this->validate($request, [
         'c_code' => 'required',
         'c_max' => 'required',
         'c_price' => 'required',
         'c_price_product' => 'required'
        ]);

        $package = new coupon();
        $package->c_code = $request['c_code'];
        $package->c_max = $request['c_max'];
        $package->c_price = $request['c_price'];
        $package->c_price_product = $request['c_price_product'];
        $package->save();
        return redirect(url('admin/coupon'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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
        $obj = coupon::find($id);
        $data['url'] = url('admin/coupon/'.$id);
        $data['datahead'] = "แก้ไข coupon";
        $data['method'] = "put";
        $data['objs'] = $obj;
        return view('admin.coupon.edit', $data);
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
        $this->validate($request, [
         'c_code' => 'required',
         'c_max' => 'required',
         'c_price' => 'required',
         'c_price_product' => 'required'
        ]);

        $package = coupon::find($id);
        $package->c_code = $request['c_code'];
        $package->c_max = $request['c_max'];
        $package->c_price = $request['c_price'];
        $package->c_price_product = $request['c_price_product'];
        $package->save();

        return redirect(url('admin/coupon/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
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
        $obj = coupon::find($id);
        $obj->delete();
        return redirect(url('admin/coupon/'))->with('delete','คุณทำการลบอสังหา สำเร็จ');
    }
}
