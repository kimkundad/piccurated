<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\cattegory_sub;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class CarSubaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $cat = DB::table('cattegory_subs')->select(
            'cattegory_subs.*'
            )
            ->get();


            foreach ($cat as $obj) {
                $optionsRes = [];


                    $obj_pro_count = DB::table('products')->select(
                      'products.*'
                      )
                      ->where('products.cattegory_subs_id', $obj->id)
                      ->count();

                $obj->options_pro = $obj_pro_count;
              }
        //
        $s = 1;
        $data['s'] = $s;
        $data['objs'] = $cat;
        $data['datahead'] = "หมวดหมู่";
        return view('admin.cattegory_subs.index', $data);
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
      $data['url'] = url('admin/cattegory_subs');
      $data['datahead'] = "สร้างหมวดหมู่ ";
      return view('admin.cattegory_subs.create', $data);
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

        $image = $request->file('image');
        $this->validate($request, [
         'name_cat' => 'required',
         'image' => 'required|max:8048'
        ]);

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $destinationPath = asset('assets/category_img/');
          $img = Image::make($image->getRealPath());
          $img->resize(870, 255, function ($constraint) {
          $constraint->aspectRatio();
        })->save('assets/image/category_img_a/'.$input['imagename']);


        $package = new cattegory_sub();
        $package->name_cat = $request['name_cat'];
        $package->image_cat = $input['imagename'];
        $package->save();
        return redirect(url('admin/cattegory_subs'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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

      $obj = cattegory_sub::find($id);
      $data['url'] = url('admin/cattegory_subs/'.$id);
      $data['datahead'] = "แก้ไขหมวดหมู่";
      $data['method'] = "put";
      $data['objs'] = $obj;
      return view('admin.cattegory_subs.edit', $data);
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

        $image = $request->file('image');
        $this->validate($request, [
         'name_cat' => 'required'
        ]);

        if($image == null){

          $package = cattegory_sub::find($id);
          $package->name_cat = $request['name_cat'];
          $package->save();

        }else{

          $objs = DB::table('cattegory_subs')
          ->select(
             'cattegory_subs.*'
             )
          ->where('id', $id)
          ->first();

          $file_path = 'assets/image/category_img_a/'.$objs->image_cat;
          unlink($file_path);


          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

            $destinationPath = asset('assets/category_img/');
            $img = Image::make($image->getRealPath());
            $img->resize(870, 255, function ($constraint) {
            $constraint->aspectRatio();
          })->save('assets/image/category_img_a/'.$input['imagename']);


          $package = cattegory_sub::find($id);
          $package->name_cat = $request['name_cat'];
          $package->image_cat = $input['imagename'];
          $package->save();

        }

        return redirect(url('admin/cattegory_subs/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
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

      $obj = cattegory_sub::find($id);
      $obj->delete();
      return redirect(url('admin/cattegory_subs/'))->with('delete','คุณทำการลบอสังหา สำเร็จ');
    }
}
