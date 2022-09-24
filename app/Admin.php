<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'userid','appnum','name','firstname', 'middlename','lastname', 'gender','birthday', 'birthplace', 'contact', 'email', 'address'
    ];

    protected $table = 'admin';

    public static function getStudents(){
        $records = DB::table('students')->select("name","firstname","middlename","lastname","gender","birthday","birthplace","contact","email","address")->orderBy('id','asc')->get()->toArray();
        return $records;
    }
}
