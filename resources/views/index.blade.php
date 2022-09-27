@extends('layouts.layout')
@section('content')

<section class="content-header">
    <h1>
        Student Application
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Student Application</li>
    </ol>
</section>

<section class="content">
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
                    <table id="example1" class="table table-bordered table-striped">
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
                                                {{-- <button  type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-edit{{ $student->id }}">Edit</button> --}}


                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                    {{-- <input type="submit" data-id="{{ $student->id }}" class="btn btn-danger delete-user" value="Delete"> --}}
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
                                            <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus onchange="validate()">

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
                                            <input id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror" name="middlename" value="{{ old('middlename') }}" required autocomplete="middlename" autofocus onchange="validate()">

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
                                            <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus onchange="validate()">

                                            @error('lastname')
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
                                            <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" onchange="validate()">

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
                                            <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" onchange="validate()">

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
                                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ $student->firstname }}" required autocomplete="firstname" autofocus onchange="validate()">

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
                                                    <input id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror" name="middlename" value="{{ $student->middlename }}" required autocomplete="middlename" autofocus onchange="validate()">

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
                                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $student->lastname }}" required autocomplete="lastname" autofocus onchange="validate()">

                                                    @error('lastname')
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
                                                    <input id="birthday" type="text" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ $student->birthday }} onchange="validate()">

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
                                                    <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ $student->contact }}" onchange="validate()">

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
</script>
