<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\category;
use App\main_cat;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $cat = DB::table('categories')->select(
            'categories.*'
            )
            ->get();


            foreach ($cat as $obj) {
                $optionsRes = [];


                    $obj_pro_count = DB::table('products')->select(
                      'products.*'
                      )
                      ->where('products.pro_category', $obj->id)
                      ->count();

                $obj->options_pro = $obj_pro_count;
              }
        //
        $s = 1;
        $data['s'] = $s;
        $data['objs'] = $cat;
        $data['datahead'] = "หมวดหมู่";
        return view('admin.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      $main_cat = main_cat::All();
      $data['main_cat'] = $main_cat;
      $data['method'] = "post";
      $data['url'] = url('admin/category');
      $data['datahead'] = "สร้างหมวดหมู่ ";
      return view('admin.category.create', $data);
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
        })->save('assets/image/category_img/'.$input['imagename']);


        $package = new category();
        $package->name_cat = $request['name_cat'];
        $package->image_cat = $input['imagename'];
        $package->id_main = $request['id_main'];
        $package->save();
        return redirect(url('admin/category'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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
        $main_cat = main_cat::All();
        $data['main_cat'] = $main_cat;
      $obj = category::find($id);
      $data['url'] = url('admin/category/'.$id);
      $data['datahead'] = "แก้ไขหมวดหมู่";
      $data['method'] = "put";
      $data['objs'] = $obj;
      return view('admin.category.edit', $data);
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

          $package = category::find($id);
          $package->name_cat = $request['name_cat'];
          $package->id_main = $request['id_main'];
          $package->save();

        }else{

          $objs = DB::table('categories')
          ->select(
             'categories.*'
             )
          ->where('id', $id)
          ->first();

          $file_path = 'assets/image/category_img/'.$objs->image_cat;
          unlink($file_path);


          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

            $destinationPath = asset('assets/category_img/');
            $img = Image::make($image->getRealPath());
            $img->resize(870, 255, function ($constraint) {
            $constraint->aspectRatio();
          })->save('assets/image/category_img/'.$input['imagename']);


          $package = category::find($id);
          $package->name_cat = $request['name_cat'];
          $package->id_main = $request['id_main'];
          $package->image_cat = $input['imagename'];
          $package->save();

        }

        return redirect(url('admin/category/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
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

      $obj = category::find($id);
      $obj->delete();
      return redirect(url('admin/category/'))->with('delete','คุณทำการลบอสังหา สำเร็จ');
    }
}
