<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\main_cat;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class McatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cat = DB::table('main_cats')->select(
              'main_cats.*'
              )
              ->get();


              foreach ($cat as $obj) {
                  $optionsRes = [];


                      $obj_pro_count = DB::table('categories')->select(
                        'categories.*'
                        )
                        ->where('categories.id_main', $obj->id)
                        ->count();

                  $obj->options_pro = $obj_pro_count;
                }
          //
          $s = 1;
          $data['s'] = $s;
          $data['objs'] = $cat;
          $data['datahead'] = "หมวดหมู่หลัก";
          return view('admin.main_cat.index', $data);
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
        $data['url'] = url('admin/main_category');
        $data['datahead'] = "สร้างหมวดหมู่หลัก ";
        return view('admin.main_cat.create', $data);
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


          $img = Image::make($image->getRealPath());
          $img->resize(870, 255, function ($constraint) {
          $constraint->aspectRatio();
        })->save('assets/image/image_main/'.$input['imagename']);


        $package = new main_cat();
        $package->name_main = $request['name_cat'];
        $package->image_main = $input['imagename'];
        $package->save();
        return redirect(url('admin/main_category'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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
        $obj = main_cat::find($id);
        $data['url'] = url('admin/main_category/'.$id);
        $data['datahead'] = "แก้ไขหมวดหมู่หลัก";
        $data['method'] = "put";
        $data['objs'] = $obj;
        return view('admin.main_cat.edit', $data);
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

          $package = main_cat::find($id);
          $package->name_main = $request['name_cat'];
          $package->save();

        }else{

          $objs = DB::table('main_cats')
          ->select(
             'main_cats.*'
             )
          ->where('id', $id)
          ->first();

          $file_path = 'assets/image/image_main/'.$objs->image_main;
          unlink($file_path);


          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();


            $img = Image::make($image->getRealPath());
            $img->resize(870, 255, function ($constraint) {
            $constraint->aspectRatio();
          })->save('assets/image/image_main/'.$input['imagename']);


          $package = main_cat::find($id);
          $package->name_main = $request['name_cat'];
          $package->image_main = $input['imagename'];
          $package->save();

        }

        return redirect(url('admin/main_category/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      DB::table('categories')
            ->where('id_main', $id)
            ->update(['id_main' => 0]);

        //
        $obj = main_cat::find($id);
        $obj->delete();
        return redirect(url('admin/main_category/'))->with('delete','คุณทำการลบอสังหา สำเร็จ');
    }
}
