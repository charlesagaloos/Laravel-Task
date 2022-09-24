<?php

namespace App\Imports;

use App\Students;
use App\User;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentsImport implements ToModel,WithHeadingRow,WithValidation,SkipsOnError,SkipsOnFailure
{
    use SkipsErrors,SkipsFailures;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(   $row)
    {
        //$user = $this->users->where('name', $row['name'])->where('email', $row['email'])->first();

        $isEmpty = Students::count();


        if($isEmpty == 0){
            $currentID = 00001;
            $applicationID = '2022A'.$currentID;
        }
        else{
            $latest = Students::all()->last()->id;
            $latestID = $latest + 00001;
            $applicationID = '2022A'.$latestID;
        }

        $user_acc = User::create([
            'appnum' => $applicationID,
            'firstname' => $row['firstname'],
            'middlename' => $row['middlename'],
            'lastname' => $row['lastname'],
            'email' => $row['email'],
            'password' => bcrypt($row['lastname']),
            'user_level' => '2',
        ]);

        //$studentdata = User::where('email',$user_acc->email)->first();


        return new Students([
            'userid' => $user_acc->id,
            'appnum' => $applicationID,
            'name' => $row['name'],
            'firstname' => $row["firstname"],
            'middlename' => $row["middlename"],
            'lastname' => $row["lastname"],
            'gender' => $row["gender"],
            'birthday' => $row["birthday"],
            'birthplace' => $row["birthplace"],
            'contact' => $row["contact"],
            'email' => $row["email"],
            'address' => $row["address"],
            'profile_pic' => 'images/admin_user.png',

        ]);
    }

    public function rules(): array
    {


        return [

           '*.email' => ['email', 'unique:students,email'],


        ];
    }

    public function onFailure(Failure ...$failure)
    {

    }

}
