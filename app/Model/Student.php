<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $table = "sign_info";//指定数据库的表名
    public $timestamp = false;
    public static function getStudents(){
        //$students = self::select('id','user_id','last_date','total_days','c_days')->get()->toArray();
        $students = self::select('id','user_id','last_date','total_days','c_days')->paginate(1);
        return $students;
    }
    public function updateStudent($id){
        $stu = self::find($id);
        $stu->user_id = 1;
        $stu->save();
    }
}
