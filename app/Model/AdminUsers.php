<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminUsers extends Model
{
    //ָ�����ݱ������
    protected $table = "admin_users";
    /*
     * @desc ͨ���û�����ȡ�û�[״̬����]
     * @param $username
     * @return array
     * */
    public static function getUserByName($username){
        $userInfo = self::where('username',$username)
            ->where('status',1)
            ->first();
        return $userInfo;
    }
    /*
     * �û�����
     * @param $data array
     * @return array
     * */
    public function addRecord($data){
        return self::insert($data);
    }
    /**
     * @desc  ͨ��id��ȡ�û�
     * @param  $id
     * @return array
     */
    public static function getUserById($id)
    {
        $userInfo = self::where('id',$id)
            ->first();

        return $userInfo;
    }
    /*
     * �޸��û���Ϣ
     * */
    public function updateUser($data,$id){
        return self::where('id',$id)->update($data);
    }
    /*
     * ��ȡ����id
     * */
    public function getMaxId(){
        return self::select('id')->orderBy('id','desc')->first();
    }
    /*
     * ��ȡ�û��б���Ϣ
     * */
    public static function getList(){
        return self::paginate(1);
    }
    /*
     * �û�ɾ��
     * @param id
     * */
    public static function del($id){
        return self::where('id',$id)->delete();
    }
}
