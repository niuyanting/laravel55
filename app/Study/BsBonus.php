<?php

namespace App\Study;

use Illuminate\Database\Eloquent\Model;

class BsBonus extends Model
{
    //�����
    protected $table='bs_bonus';
    /*
     * $desc ��ȡ�����Ϣ
     * $param $id*/
    public static function getBonusInfo($id){
        $bonus = self::where('id',$id)->first();
        return $bonus;
    }
    /*
     * @desc ���º����Ϣ
     * */
    public static function updateBonusInfo($data,$id){
        return self::where('id',$id)->update($data);
    }
    //��Ӻ���ĺ���
    public static function addBonus($data){
        $res = self::insert($data);
        return $res;
    }
    //��ȡ����б�
    public static function getBonusList(){
        $list = self::orderBy('id','desc')
                ->get()
                ->toArray();
        return $list;
    }
}
