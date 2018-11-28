<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\category_blog;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class BlogCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cat = category_blog::all();


            /*  foreach ($cat as $obj) {
                  $optionsRes = [];


                      $obj_pro_count = DB::table('products')->select(
                        'products.*'
                        )
                        ->where('products.pro_category', $obj->id)
                        ->count();

                  $obj->options_pro = $obj_pro_count;
                } */
          //
          $s = 1;
          $data['s'] = $s;
          $data['objs'] = $cat;
          $data['datahead'] = "หมวดหมู่";
          return view('admin.b_category.index', $data);
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
        $data['url'] = url('admin/b_category');
        $data['datahead'] = "สร้างหมวดหมู่ ";
        return view('admin.b_category.create', $data);
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
         'name_blog_cat' => 'required'
        ]);


        $package = new category_blog();
        $package->name_blog_cat = $request['name_blog_cat'];
        $package->save();
        return redirect(url('admin/b_category'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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
        $obj = category_blog::find($id);
        $data['url'] = url('admin/b_category/'.$id);
        $data['datahead'] = "แก้ไขหมวดหมู่";
        $data['method'] = "put";
        $data['objs'] = $obj;
        return view('admin.b_category.edit', $data);
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
         'name_blog_cat' => 'required'
        ]);

        $package = category_blog::find($id);
        $package->name_blog_cat = $request['name_blog_cat'];
        $package->save();
        return redirect(url('admin/b_category/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');

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
        $obj = category_blog::find($id);
        $obj->delete();
        return redirect(url('admin/b_category/'))->with('delete','คุณทำการลบอสังหา สำเร็จ');
    }
}
