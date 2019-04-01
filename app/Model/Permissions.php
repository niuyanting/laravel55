<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Tools\ToolsAdmin;
class Permissions extends Model
{
    //ָ������
    protected $table = "Permissions";
    const
        IS_MENU = 1,//�ǲ˵�
        IS_NO_MENU = 2,//���ǲ˵�
        END = true;
    /*
     * ��ȡ���˵�����Ȩ������
     * @return array
     * */
    public static function getMeuns($user = []){
        $permissions = self::select('id','fid','name','url')
                ->where('is_menu',self::IS_MENU)
                ->orderBy('sort')
                ->get()
                ->toArray();
        //������ǳ���
        if($user['is_super'] != 2){
            $pids = ToolsAdmin::getUserPermissionIds($user['user_id']);//��ǰ��¼�û�Ȩ�޽ڵ�
            $permissions = self::select('id','fid','name','url')
                ->whereIn('id',$pids)
                ->where('is_menu',self::IS_MENU)
                ->orderBy('sort')
                ->get()
                ->toArray();
        }
        $leftMenu = ToolsAdmin::buildTree($permissions);
        return $leftMenu;
    }
    /**
     * ��ȡ���е�Ȩ�޽ڵ�
     */
    public static function getAllPermissions()
    {
        $permissions = self::select('id','fid','name','url')
            ->orderBy('sort')
            ->get()
            ->toArray();

        $permissions = ToolsAdmin::buildTree($permissions);

        return $permissions;
    }
    /*
     * ��ȡȨ���б�
     * @return array
     * */
    public static function getListByFid($fid=0){
        $list = self::select('id','fid','name','url','is_menu','sort')
                ->where('fid',$fid)
                ->orderBy('sort')
                ->get()
                ->toArray();
        return $list;
    }
    /*
     * ���Ȩ��
     * @return bool*/
    public static function addRecord($data){
        return self::insert($data);
    }
    /*
     * ɾ��Ȩ�޵ĺ���
     * */
    public static function delRecord($id){
        return self::where('id',$id)->delete();
    }
    /*
     * ͨ��Ȩ�޵�����id��ȡȨ�޵�URL��ַ����
     * */
    public static function getUrlsByIds($pids){
        $permissions = self::select('url')
                    ->whereIn('id',$pids)
                    ->get()
                    ->toArray();
        $urls = [];
        foreach ($permissions as $key => $value){
            $urls[] = $value['url'];
        }

        return $urls;
    }
}
