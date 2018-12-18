<?php

use Illuminate\Support\Facades\DB;

function get_cat(){

  $cat1 = DB::table('categories')->select(
        'categories.*'
        )
        ->where('id_main', 1)
        ->get();
      //  dd($cat1);

  return $cat1;
}
