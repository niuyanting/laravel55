<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = "role";
    /*
     * ��ȡ���еĽ�ɫ�б�
     * */
    public function getRoles(){
        return self::get()
                ->toArray();
    }
    /*
     * ��ɫɾ��
     * */
    public function delRole($id){
        return self::where('id',$id)->delete();
    }
    /*
     * ��ȡ��ɫ����
     * */
    public function getRoleById($id){
        return self::where('id',$id)->first();
    }
    /*
     * ���
     * */
    public function addRole($data){
        return self::insert($data);
    }
    /*
     * ��ɫ�༭
     * */
    public function updateRole($data,$id){
        return self::where('id',$id)->update($data);
    }
}
