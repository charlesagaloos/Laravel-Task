<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Students extends Model
{
    protected $fillable = [
        'userid','appnum','name','firstname', 'middlename','lastname', 'gender','birthday', 'birthplace', 'contact', 'email', 'address','profile_pic'
    ];

    protected $table = 'students';

    public static function getStudents(){
        $records = DB::table('students')->select("name","firstname","middlename","lastname","gender","birthday","birthplace","contact","email","address")->orderBy('id','asc')->get()->toArray();
        return $records;
    }


}
