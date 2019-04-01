<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    //
    protected $table = "role_permissions";
    /*
     * ͨ��role_idɾ����ɫȨ�޵ļ�¼
     * */
    public function delByRoleId($roleId){
        return self::where('role_id',$roleId)->delete();
    }
    /*
     * ͨ���û���ɫ��id��ȡ�����������Ȩ�޽ڵ�id
     * */
    public function getPermissionByRoleId($roleId){
        $data = self::select('p_id')
                ->where('role_id',$roleId)
                ->get()
                ->toArray();
        $pids = [];
        foreach($data as $key => $value){
            $pids[] = $value['p_id'];
        }
        return $pids;
    }
    /*
     * ����µĽ�ɫȨ�޽ڵ�
     * */
    public function addRolePermission($data){
        return self::insert($data);
    }

}
