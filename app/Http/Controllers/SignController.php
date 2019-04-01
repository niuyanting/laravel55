<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/*use App\Sign;
use Log;*/
class SignController extends Controller
{
    //
    public function index(Request $request){
        //Log::info('²âÊÔÒ»ÏÂ');
        $sign_info = DB::select('select * from sign_info');
       /* $sign_info = DB::table('sign_info')->select('last_date as times','id')->whereIn('id',[1,3])->get();
        $goods = DB::table('bp_goods')->join('bp_goods_img','bp_goods.id','=','bp_goods_img.goods_id')->get()->toArray();
        dd($sign_info);
        foreach($sign_info as $key => $value){
            echo $value->id;
        }*/
        //dd($sign_info);
        $assign = ['message'=> 1,'sign_info'=>$sign_info];
        return view('sign',$assign);
    }
}