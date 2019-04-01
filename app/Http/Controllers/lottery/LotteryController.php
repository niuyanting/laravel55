<?php

namespace App\Http\Controllers\lottery;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class LotteryController extends Controller
{
    //
    public function index(){
        return view('lottery.index');
    }
    //执行抽奖
    public function doLottery(Request $request){
        $telPhone = $request->input('phone');
        $start = date('Y-m-d 11:00:00',time());
        $end = date('Y-m-d 13:00:00',time());
        $return = [
            'code' => 2000,
            'msg' => '成功'
        ];
        if(empty($telPhone)){
            $return = [
                'code' => 4001,
                'msg' => '手机号不能为空'
            ];
            return json_encode($return);
        }
        $user = DB::table('lottery_user')->where('phone',$telPhone)->first();
        if(empty($user)){
            $return = [
                'code' => 4002,
                'msg' => '用户不存在'
            ];
            return json_encode($return);
        }
        $records = DB::table('lottery_record')->where('user_id',$user->id)->where('created_at',date('Y-m-d'))->count();

        if($records >= 3){
            $return = [
                'code' => 4003,
                'msg' => '今日的三次抽奖次数已用完，请明天再来'
            ];
            return json_encode($return);
        }

        if(time() > strtotime($end) || time() < strtotime($start)){
            $return = [
                'code' => 4004,
                'msg' => '今日活动已结束，请于明天十点到十一点之间来抽奖'
            ];
            return json_encode($return);
        }

        $lottery = DB::table('lottery')->get()->toArray();
        $lotterys = $precents = [];
        foreach($lottery as $key => $value){
            $lotterys[$value->id] = [
                'lottery_name' => $value->lottery_name
            ];

            $precents[$value->id] = $value->precent;
        }

        $preSum = array_sum($precents);

        $result = '';

        foreach($precents as $k=>$v){
            $preCurrent = mt_rand(1,$preSum);
        }

        if($v > $preCurrent){
            $result = $k;
            //break;
            exit;
        }else{
            $preSum = $preSum - $v;
        }

        $data = [
            'user_id' =>$user->id,
            'lottery_id' =>$result,
            'created_at' =>date('Y-m-d')
        ];
        DB::table('lottery_record')->insert($data);

        $return['msg'] = $lotterys[$result]['lottery_name'];

        return json_encode($return);

    }
}
