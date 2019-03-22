<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\comtact;

class EnvelopeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cat = DB::table('comtacts')->select(
              'comtacts.*'
              )
              ->orderBy('id', 'desc')
              ->paginate(15);


                $data['objs'] = $cat;
                $data['datahead'] = "จัดการข้อความ";
        return view('admin.envelope.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $package = comtact::find($id);
      $package->status = 1;
      $package->save();


      $objs = comtact::find($id);
      $data['u'] = $objs;
      $data['datahead'] = 'อ่านข้อความ';



      return view('admin.envelope.edit',$data);
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
        $obj = comtact::find($id);
        $obj->delete();

      //  echo $objs->image;;
        return redirect(url('admin/contact_admin'))
        ->with('delete_envelope','ทำการลบ ข้อความ สำเร็จ');
    }
}
