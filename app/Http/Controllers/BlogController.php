<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog;
use App\product;
use App\blog_product;
use Validator;
use Response;
use Redirect;
use App\category_blog;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cat = blog::all();

        foreach($cat as $u){

          $category_blog = DB::table('category_blogs')->select(
                    'category_blogs.name_blog_cat'
                    )
                    ->where('id', $u->blog_cat)
                    ->first();

            $u->option = $category_blog->name_blog_cat;
        }


              $data['objs'] = $cat;
              $data['datahead'] = "จัดการบทความ";
      return view('admin.blog.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      $product = product::all();
      $cat = category_blog::all();
      $data['product'] = $product;
      $data['objs'] = $cat;
      $data['header'] = 'เพิ่มบทความ';
      $data['method'] = 'post';
      $data['url'] = url('admin/blog/');
      return view('admin.blog.create',$data);
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
             'image' => 'required|max:8048',
             'blog_title' => 'required',
             'blog_cat' => 'required',
             'blog_type' => 'required',
             'blog_detail' => 'required'
         ]);




        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = asset('assets/image/blog/');
        $img = Image::make($image->getRealPath());
        $img->resize(1624, 750, function ($constraint) {
        $constraint->aspectRatio();
      })->save('assets/image/blog/'.$input['imagename']);


       $package = new blog();
       $package->blog_title = $request['blog_title'];
       $package->blog_cat = $request['blog_cat'];
       $package->blog_type = $request['blog_type'];
       $package->blog_url = $request['blog_url'];
       $package->blog_img = $input['imagename'];
       $package->set_product = $request['set_product'];
       $package->blog_detail = $request['blog_detail'];
       $package->save();

       $the_id = $package->id;

       $product = $request['product'];

       if (sizeof($product) > 0) {
          for ($i = 0; $i < sizeof($product); $i++) {
            $admins[] = [
                'product_id' => $product[$i],
                'blog_id' => $the_id
            ];
          }
          blog_product::insert($admins);
        }

       return redirect(url('admin/blog/'.$the_id.'/edit'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');


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
        $blog = DB::table('blogs')->select(
                  'blogs.*',
                  'blogs.id as id_b',
                  'category_blogs.id as id_ca'
                  )
                  ->leftjoin('category_blogs', 'category_blogs.id',  'blogs.blog_cat')
                  ->where('blogs.id', $id)
                  ->first();
          $data['blog'] = $blog;

          $product = product::all();

          foreach($product as $u){

            $blog_set = DB::table('blog_products')->select(
                      'blog_products.*'
                      )
                      ->where('blog_products.product_id', $u->id)
                      ->where('blog_products.blog_id', $id)
                      ->count();

            $u->option = $blog_set;

          }

          $cat = category_blog::all();
          $data['product'] = $product;
          $data['objs'] = $cat;

          $data['method'] = "put";
        $data['url'] = url('admin/blog/'.$id);
        $data['header'] = "แก้ไข blog ";
        return view('admin.blog.edit', $data);
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
             'blog_title' => 'required',
             'blog_cat' => 'required',
             'blog_type' => 'required',
             'blog_detail' => 'required'
         ]);

         if($image == NULL){


           $package = blog::find($id);
           $package->blog_title = $request['blog_title'];
           $package->blog_cat = $request['blog_cat'];
           $package->blog_type = $request['blog_type'];
           $package->blog_url = $request['blog_url'];
           $package->set_product = $request['set_product'];
           $package->blog_detail = $request['blog_detail'];
           $package->save();



         }else{

           $objs = DB::table('blogs')
           ->select(
              'blogs.*'
              )
           ->where('id', $id)
           ->first();

           $file_path = 'assets/image/blog/'.$objs->blog_img;
           unlink($file_path);



           $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

           $destinationPath = asset('assets/image/blog/');
           $img = Image::make($image->getRealPath());
           $img->resize(1624, 750, function ($constraint) {
           $constraint->aspectRatio();
         })->save('assets/image/blog/'.$input['imagename']);



           $package = blog::find($id);
           $package->blog_title = $request['blog_title'];
           $package->blog_cat = $request['blog_cat'];
           $package->blog_type = $request['blog_type'];
           $package->blog_url = $request['blog_url'];
           $package->blog_img = $input['imagename'];
           $package->set_product = $request['set_product'];
           $package->blog_detail = $request['blog_detail'];
           $package->save();



         }

         $res=blog_product::where('blog_id',$id)->delete();

         $product = $request['product'];

         if (sizeof($product) > 0) {
            for ($i = 0; $i < sizeof($product); $i++) {
              $admins[] = [
                  'product_id' => $product[$i],
                  'blog_id' => $id
              ];
            }
            blog_product::insert($admins);
          }



          return redirect(url('admin/blog/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }


    public function imagess(Request $request) {

        $data = array('image' => $request->file('files'));
        $rules = array(
            'image' => 'required|max:8048',
            );

        $validator = Validator::make($data,$rules);

        if($validator->fails()) {
            return Response::json($validator->errors()->first('image'), 400);
        }

        $file = $request->file('files');
        $destinationPath = 'assets/image/blog'; // upload path
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $fileName = sha1(time().time()).".{$extension}";
        $file->move($destinationPath, $fileName); // uploading file to given path

        return $fileName;

    }




    public function api_blog_status(Request $request){

    $user = blog::findOrFail($request->user_id);

              if($user->blog_status == 1){
                  $user->blog_status = 0;
              } else {
                  $user->blog_status = 1;
              }


      return response()->json([
      'data' => [
        'success' => $user->save(),
      ]
    ]);

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
        $objs = DB::table('blogs')
            ->select(
               'blogs.*'
               )
            ->where('id', $id)
            ->first();

        $file_path = 'assets/image/blog/'.$objs->blog_img;
        unlink($file_path);

        $blog_pro = DB::table('blog_products')
            ->where('blog_id', $id)
            ->delete();

        $obj = blog::find($id);
        $obj->delete();
        return redirect(url('admin/blog/'))->with('delete','คุณทำการลบอสังหา สำเร็จ');
    }
}
