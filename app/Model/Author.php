<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class Author extends Model
{
    //作者表名
    protected $table="author";
    const PAGE_SIZE = 5;
    /*
     * 作者分页显示
     * */
    public function getLists(){
        return self::paginate(self::PAGE_SIZE);
    }
    /*
     * 执行作者添加
     * */
    public function addRecord($data){
        return self::insert($data);
    }
    //删除作者
    public function delRecord($id){
        return self::where('id',$id)->delete();
    }
    //获取作者列表
    public function getAuthor(){
        return self::get()->toArray();
    }
}
