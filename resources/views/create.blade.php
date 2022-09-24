@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')

<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">


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
            <div class="box box-info">
                <div class="box-header with-border">
                <h3 class="box-title">Create New Admin</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="row">
                    <form form="{{ route('admin.store') }}" method="POST">
                        @csrf
                        <div class="col-sm-4">
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
                        <div class="left">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
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
