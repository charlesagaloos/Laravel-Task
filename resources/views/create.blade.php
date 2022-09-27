@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
@endif


<section class="content">
    <div class="asd"style="width:100%; float:left; margin-top:5%;">
        <ol class="breadcrumb" style="float: right;">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Line Chart</li>
            <li class="active">New Admin
        </ol>
    </div>
    <div class="row" style="margin-top:5%;">
      <div style="margin:auto; width:1000px; margin-top:70px;">
        <div class="box">



            <div class="box box-info" style="width:100%; margin: auto; padding:15px;"   >
                <div class="box-header with-border">
                <h3 class="box-title">Create New Admin</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="row">
                    <form form="{{ route('admin.store') }}" method="POST">
                        @csrf
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4" style="padding:10px;">
                                    <div class="left">
                                        <strong>First Name</strong>
                                        <input type="text" name="firstname" class="form-control" placeholder="firstname" required placeholder="firstname">
                                    </div>
                                </div>
                                <div class="col-md-4" style="padding:10px;">
                                    <div class="left">
                                        <strong>Middle Name</strong>
                                        <input type="text" name="middlename" class="form-control" placeholder="middle name" required placeholder="middlename">
                                    </div>

                                </div>
                                <div class="col-md-4" style="padding:10px;">
                                    <div class="left">
                                        <strong>Last Name</strong>
                                        <input type="text" name="lastname" class="form-control" placeholder="lastname" required placeholder="lastname">
                                    </div>

                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-4" style="padding:10px;">
                                    <div class="left">
                                        <strong>Gender</strong>
                                        {{-- <input type="text" name="gender" class="form-control" placeholder="Gender" required> --}}
                                        <div class="col-90">
                                            <input type="radio" id="male" name="gender" value="Male" @if (old('gender'))
                                                checked
                                            @endif/>Male
                                            <input type="radio" id="female" name="gender" value="Female" @if (old('gender'))
                                            checked
                                        @endif/>Female
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" style="padding:10px;">
                                    <div class="left">
                                        <strong>Birthday</strong>
                                        <input type="date" name="birthday" class="form-control" placeholder="Birthday" required>
                                    </div>
                                </div>
                                <div class="col-md-4" style="padding:10px;">
                                    <div class="left">
                                        <strong>Birth Place</strong>
                                        <input type="text" name="birthplace" class="form-control" placeholder="Birth Place" required placeholder="birthplace">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4" style="padding:10px;">
                                    <div class="left">
                                        <strong>Contact</strong>
                                        <input id="contact" type="tel" class="form-control" name="contact"  onkeypress="return restrictAplhabets(e)" maxlength=11 placeholder="only 11 digits are allowed">
                                    </div>

                                </div>
                                <div class="col-md-4" style="padding:10px;">
                                    <div class="left">
                                        <strong>Email</strong>
                                        <input type="email" name="email" class="form-control" placeholder="Email" required placeholder="email address">
                                    </div>
                                </div>
                                <div class="col-md-4" style="padding:10px;">
                                    <div class="left">
                                        <strong>Address</strong>
                                        <input type="text" name="address" class="form-control" placeholder="Address" required placeholder="address">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:15px;">

                                <div class="col-md-12">
                                    <button style= "margin:auto; width:100%; display:block;" type="submit" class="btn btn-success">Submit</button>
                                </div>

                            </div>
                        </div>

                        {{-- <div class="col-sm-12">
                            <div class="left">
                                <strong>First Name</strong>
                                <input type="text" name="firstname" class="form-control" placeholder="firstname" required>
                            </div>

                            <div class="left">
                                <strong>Middle Name</strong>
                                <input type="text" name="middlename" class="form-control" placeholder="middle name" required>
                            </div>

                            <div class="left">
                                <strong>Last Name</strong>
                                <input type="text" name="lastname" class="form-control" placeholder="lastname" required>
                            </div>

                            <div class="left">
                                <strong>Gender</strong>
                                <input type="text" name="gender" class="form-control" placeholder="Gender" required>
                            </div>

                            <div class="left">
                                <strong>Birthday</strong>
                                <input type="text" name="birthday" class="form-control" placeholder="Birthday" required>
                            </div>

                            <div class="left">
                                <strong>Birth Place</strong>
                                <input type="text" name="birthplace" class="form-control" placeholder="Birth Place" required>
                            </div>

                            <div class="left">
                                <strong>Contact</strong>
                                <input type="text" name="contact" class="form-control" placeholder="Contact" required>
                            </div>

                            <div class="left">
                                <strong>Email</strong>
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>

                            <div class="left">
                                <strong>Address</strong>
                                <input type="text" name="address" class="form-control" placeholder="Address" required>
                            </div>
                            <br>
                            <div class="center">
                                <button style= "margin:auto; width:100%; display:block;" type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>

  @endsection
