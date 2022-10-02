<?php

namespace App\Exports;

use App\Students;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class StudentsExport implements FromCollection,WithHeadings,ShouldAutoSize
{
    public function headings():array{
        return [
            'name',
            'firstname',
            'middlename',
            'lastname',
            'gender',
            'birthday',
            'birthplace',
            'age',
            'contact',
            'email',
            'address'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Students::getStudents());
    }
}
