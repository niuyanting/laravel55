<?php

namespace App\Study;

use Illuminate\Database\Eloquent\Model;

class BsBonusRecord extends Model
{
    /*
     *@desc ����һ����¼
     * @data array*/
    protected $table='bs_bonus_record';
    public static function createRecord($data){
        $res = self::insert($data);
        return $res;
    }
    /*
     * ��ȡ�����ĺ��
     * @param $bonusId int
     * */
    public static function getMaxBonus($bonusId){
        $res = self::select('id')
            ->where('bonus_id',$bonusId)
            ->orderBy('money','desc')
            ->first();
        return $res;
    }
    /*
     * @desc ����������ļ�¼
     * */
    public static function updateBonusRecord($data,$id){
        return self::where('id',$id)->update($data);
    }
    /*
     * ͨ���û�id�ͺ��id��ȡ����ļ�¼
     * */
    public static function getRecordById($userId,$bonusId){
        $res = self::where('user_id',$userId)
            ->where('bonus_id',$bonusId)
            ->first();
        return $res;
    }
    /*
     * ��ȡ�����¼�б�
     * */
    public static function getBonusRecord($bonusId){
        return self::where('bonus_id',$bonusId)
                    ->get()
                    ->toArray();
    }
}
