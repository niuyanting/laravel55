<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    //
    protected $table = "user_role";
    public $timestamps = false;
    /*
     * ����û���ɫ��¼
     * */
    public function addUserRole($data){
        return self::insert($data);
    }
    /*
     * ͨ��userIdɾ����¼
     * */
    public function delByUserId($userId){
        return self::where('user_id',$userId)->delete();
    }
    /*
     * ͨ����ɫidɾ����¼
     * */
    public function delByRoleId($roleId){
        return self::where('role_id',$roleId)->delete();
    }
    /*
     * ͨ���û�id��ȡ��¼
     * */
    public function getByUserId($userId){
        return self::where('user_id',$userId)->first();
    }
}
