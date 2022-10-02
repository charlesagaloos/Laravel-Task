@extends('layouts.layout')
@section('content')

<style>

    input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

input[type=number] {
  -moz-appearance: textfield;
}
</style>

<section class="content">
    <div class="asd"style="width:100%; float:left; margin-top:5%;">
        <ol class="breadcrumb" style="float: right;">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Student Application</li>
        </ol>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Students</h3>
                </div>
                <!-- /.box-header -->

                <div class="btn-group">
                    <div class="btn">
                        <div>
                            <a class="btn btn-warning" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i> Add New Student</a>
                        </div>
                    </div>

                    <div class="btn">
                        <div>
                            <a class="btn btn-danger" href="{{ route('student.downloadpdf')}}"><i class="fa fa-download"></i> Download PDF</a>
                        </div>
                    </div>

                    <div class="btn">
                        <div>
                            <a class="btn btn-success" href="{{ route('student.importform')}}"><i class="fa fa-file-import"></i> Import Excel File</a>
                        </div>
                    </div>

                    <div class="btn">
                        <div>
                            <a class="btn btn-primary" href="{{ route('student.exportform')}}"><i class="fa fa-file-export"></i> Export Excel File</a>
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="container-fluid">
                    <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        {{-- <th>No.</th> --}}
                        <th style="width: 20%">Name</th>
                        <th>Gender</th>
                        <th>Birthday</th>
                        <th style="width: 12%">Birth Place</th>
                        <th>Contact</th>
                        <th style="width: 20%">Email</th>
                        <th style="width: 20%">Address</th>
                        <th style="width: 10%">Option</th>

                    </tr>
                    </thead>
                    @php

                        @endphp
                        @foreach ($students as $student)
                            <tbody>
                                <tr id="student_id_{{ $student->id }}">
                                    {{-- <td>{{ $student->id }}</td> --}}
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->gender }}</td>
                                    <td>{{ $student->birthday }}</td>
                                    <td>{{ $student->birthplace }}</td>
                                    <td>{{ $student->contact }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->address }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <form action="{{ route('student.destroy',$student->id) }}" method="POST">
                                                <a class="btn btn-success" href="{{ url('students/edit/'.$student->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <button  type="button" name="editbutton"class="btn btn-info" data-toggle="modal" data-target="#modal-edit {{$student->appnum}}">Edit</button>



                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" data-id="{{ $student->id }}" class="btn btn-danger delete-user">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>


                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>



                {!! $students->links() !!}

                {{-- ADD STUDENT MODAL --}}
                <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Add New Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form name="custForm" action="{{ route('student.store') }}" method="POST">
                                <input type="hidden" name="cust_id" id="cust_id" >
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>First Name</strong>
                                            <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus onchange="validate()" minlength="2" onkeyup="this.value=this.value.replace(/[^a-zA-Z0-9]/g, '')"  onkeydown='preventNumbers(event)' onkeyup='preventNumbers(event)'>

                                            @error('firstname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Middle Name</strong>
                                            <input id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror" name="middlename" value="{{ old('middlename') }}" required autocomplete="middlename" autofocus onchange="validate()" minlength="2" onkeyup="this.value=this.value.replace(/[^a-zA-Z0-9]/g, '')"  onkeydown='preventNumbers(event)' onkeyup='preventNumbers(event)'>

                                            @error('middlename')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Last Name</strong>
                                            <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus onchange="validate()" minlength="2" onkeyup="this.value=this.value.replace(/[^a-zA-Z0-9]/g, '')"  onkeydown='preventNumbers(event)' onkeyup='preventNumbers(event)'>

                                            @error('lastname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Username</strong>
                                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus onchange="validate()" minlength="8">

                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Gender</strong>
                                            {{-- <input id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" onchange="validate()"> --}}
                                            <div class="col-90">
                                                <input type="radio" id="male" name="gender" value="Male" @if (old('gender'))
                                                    checked
                                                @endif/>Male
                                                <input type="radio" id="female" name="gender" value="Female" @if (old('gender'))
                                                checked
                                            @endif/>Female
                                            </div>
                                            @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Birthday</strong>
                                            <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" onchange='agecalculator()'>
                                            <input type='hidden' id='input_age' value="{{ old('agevalue')}}" name="agevalue">
                                                &nbsp&nbsp&nbsp <span class='agehere'></span>
                                            @error('birthday')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Birth Place</strong>
                                            <input id="birthplace" type="text" class="form-control @error('birthplace') is-invalid @enderror" name="birthplace" value="{{ old('birthplace') }}" onchange="validate()">

                                            @error('birthplace')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Contact</strong>
                                            {{-- <input id="contact" type="number" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" onchange="validate()"> --}}
                                            <input id="contact" type="tel" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" onkeypress="return onlyNumberKey(event)" maxlength=11  placeholder="only 11 digits are allowed">
                                            @error('contact')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Email</strong>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Address</strong>
                                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" onchange="validate()">

                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('student.app') }}" class="btn btn-danger">Cancel</a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    </div>
                </div>

                            {{-- Edit STUDENT MODAL --}}
                        <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Student</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form name="custForm" action="{{ route('student.update', $student->id) }}" method="POST">
                                        <input type="hidden" name="cust_id" id="cust_id" >
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>First Name</strong>
                                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ $student->firstname }}" required autocomplete="firstname" autofocus onchange="validate()" minlength="2" onkeyup="this.value=this.value.replace(/[^a-zA-Z0-9]/g, '')"  onkeydown='preventNumbers(event)' onkeyup='preventNumbers(event)'>

                                                    @error('firstname')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Middle Name</strong>
                                                    <input id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror" name="middlename" value="{{ $student->middlename }}" required autocomplete="middlename" autofocus onchange="validate()" minlength="2" onkeyup="this.value=this.value.replace(/[^a-zA-Z0-9]/g, '')"  onkeydown='preventNumbers(event)' onkeyup='preventNumbers(event)'>

                                                    @error('middlename')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Last Name</strong>
                                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $student->lastname }}" required autocomplete="lastname" autofocus onchange="validate()" minlength="2" onkeyup="this.value=this.value.replace(/[^a-zA-Z0-9]/g, '')"  onkeydown='preventNumbers(event)' onkeyup='preventNumbers(event)'>

                                                    @error('lastname')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Username</strong>
                                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $student->username }}" required autocomplete="username" autofocus onchange="validate()" minlength="8">

                                                    @error('username')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Gender</strong>
                                                    <input id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ $student->gender }}" onchange="validate()">

                                                    @error('gender')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Birthday</strong>
                                                    <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ $student->birthday }} onchange="validate()">
                                                    <input type='hidden' id='input_age' value="{{ old('agevalue')}}" name="agevalue">
                                                        &nbsp&nbsp&nbsp <span class='agehere'></span>
                                                    @error('birthday')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Birth Place</strong>
                                                    <input id="birthplace" type="text" class="form-control @error('birthplace') is-invalid @enderror" name="birthplace" value="{{ $student->birthplace }}" onchange="validate()">

                                                    @error('birthplace')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Contact</strong>

                                                    <input id="contact" type="tel" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" onkeypress="return onlyNumberKey(event)" maxlength=11  placeholder="only 11 digits are allowed">
                                                    @error('contact')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Email</strong>
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $student->email }}" required autocomplete="email">

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Address</strong>
                                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $student->address }}" onchange="validate()">

                                                    @error('address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary">Submit</button>
                                                <a href="{{ route('student.app') }}" class="btn btn-danger">Cancel</a>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            </div>
                        </div>
            </div>
        </div>

@endsection


          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>

<script>
    error=false

function validate()
{
    if(document.custForm.name.value !='' && document.custForm.email.value !='' && document.custForm.address.value !='')
        document.custForm.btnsave.disabled=false
    else
        document.custForm.btnsave.disabled=true
}

        function onlyNumberKey(evt) {

        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
        }

        function preventNumbers(e){
        var keyCode = (e.keyCode ? e.keyCode : e.which);
        if(keyCode > 47 && keyCode < 58 || keyCode > 95 && keyCode < 107)
        {
            e.preventDefault();
        }
    }



        function agecalculator(){
               var dNow = new Date();

            var birthdate = document.getElementById('birthday');
            var birthday = new Date(birthdate.value);

            var cmm = dNow.getMonth()+1;
            var cdd = dNow.getDate();
            var cyy = dNow.getFullYear();

            var dd = birthday.getDate()+1;
            var mm = birthday.getMonth()+1;
            var yy = birthday.getFullYear();

            var agebyyear = Math.abs(yy - dNow.getFullYear());

            if((agebyyear > 12 && mm < cmm ) || (agebyyear > 12 && mm == cmm && dd <= cdd))
            {
                $(".agehere").html(agebyyear+ " years old");
                $('#input_age').val(agebyyear);
            }else if((agebyyear > 12 && mm > cmm ) || (agebyyear > 12 && mm == cmm && dd >= cdd)){
                $(".agehere").html(agebyyear - 1 + " years old");
                $('#input_age').val(agebyyear - 1);
            }
            else
            {

                $(".agehere").html("Underage");
                $('#input_age').val(null);
            }


    }

</script>
