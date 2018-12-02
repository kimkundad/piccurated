<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\banner;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $cat = DB::table('banners')->select(
              'banners.*'
              )
              ->get();

              $s = 1;
              $data['s'] = $s;
              $data['objs'] = $cat;
              $data['datahead'] = "Banner Show";
              return view('admin.banner.index', $data);
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
        $data['url'] = url('admin/banner');
        $data['datahead'] = "สร้าง banner ";
        return view('admin.banner.create', $data);
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
         'url_banner' => 'required'
        ]);

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $destinationPath = asset('assets/image/banner/');
          $img = Image::make($image->getRealPath())->save('assets/image/banner/'.$input['imagename']);


        $package = new banner();
        $package->banner_sort = $request['banner_sort'];
        $package->url_banner = $request['url_banner'];
        $package->image_banner = $input['imagename'];
        $package->save();
        return redirect(url('admin/banner'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
    }


    public function api_banner_status(Request $request){

      $user = banner::findOrFail($request->user_id);

                if($user->status_banner == 1){
                    $user->status_banner = 0;
                } else {
                    $user->status_banner = 1;
                }


        return response()->json([
        'data' => [
          'success' => $user->save(),
        ]
      ]);

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
        $obj = banner::find($id);
        $data['url'] = url('admin/banner/'.$id);
        $data['datahead'] = "แก้ไข banner";
        $data['method'] = "put";
        $data['objs'] = $obj;
        return view('admin.banner.edit', $data);
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
         'url_banner' => 'required'
        ]);

        if($image == null){

          $package = banner::find($id);
          $package->banner_sort = $request['banner_sort'];
          $package->url_banner = $request['url_banner'];
          $package->save();
        }
        else{

          $objs = DB::table('banners')
          ->select(
             'banners.*'
             )
          ->where('id', $id)
          ->first();

          $file_path = 'assets/image/banner/'.$objs->image_banner;
          unlink($file_path);


          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

            $destinationPath = asset('assets/image/banner/');
            $img = Image::make($image->getRealPath())->save('assets/image/banner/'.$input['imagename']);

          $package = banner::find($id);
          $package->banner_sort = $request['banner_sort'];
          $package->url_banner = $request['url_banner'];
          $package->image_banner = $input['imagename'];
          $package->save();

        }


        return redirect(url('admin/banner/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
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

        $objs = DB::table('banners')
        ->select(
           'banners.*'
           )
        ->where('id', $id)
        ->first();

        $file_path = 'assets/image/banner/'.$objs->image_banner;
        unlink($file_path);
          //
          $obj = banner::find($id);
          $obj->delete();
          return redirect(url('admin/banner/'))->with('delete','คุณทำการลบอสังหา สำเร็จ');
    }
}
