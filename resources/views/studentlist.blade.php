<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student List</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    {{-- <script src="https://cdn.tailwindss.com"></script> --}}

    <style>

        .table{
            position: relative;
            width:100%;
            margin-left: auto;
            margin-right: auto;
            top:30px;
            text-align:center;

        }

        .table td, .table th{
            padding: 5px; border: solid 1px #777;


        }

        .table tr:nth-child(even){
            background-color:lightgrey;
        }
        .table th{
            text-align:center;
            background-color: lightblue;

        }

    </style>
</head>
<body>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div>
                <h2>Student List</h2>
            </div>
        </div>
    </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Birthday</th>
                    <th>Birth Place</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                @php

                @endphp
                @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->birthday }}</td>
                    <td>{{ $student->birthplace }}</td>
                    <td>{{ $student->contact }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->address }}</td>


                </tr>
                @endforeach
            </tbody>



        </table>
</body>
</html>
