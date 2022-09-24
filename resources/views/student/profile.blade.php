@extends('layouts.userlayout')
@section('content')

@if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
          @endif


          <div class="create-announcement">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif

<section class="content-header">
    <h1>
      User Profile
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/students/dashboard/') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">User profile</li>
    </ol>
  </section>

<section class="content">
    @foreach ($students as $student)
    <div class="row">
      <div class="col-md-6">
        <div class="box">

            <form action="{{ route('profile.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                {{ @csrf_field() }}
                @method('PUT')

                  <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ URL::to($student->profile_pic) }}" alt="User profile picture">

              <div class="button-wrapper">
                <span class="label">
                  Change Photo
                </span>

                  <input type="file" name="profile_pic[]" id="upload" class="upload-box" placeholder="Upload File" required>

              </div>

              <h3 class="profile-username text-center">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h3>

                {{-- <a href="#" class="btn btn-warning btn-block"><i class="fa-solid fa-upload"></i> </i><b>Change Picture </b></a> --}}
                {{-- <input type="file" class="btn btn-warning"> --}}
              <div class="box-body">
                <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                <p class="text-muted">
                  International State Campus of The Philippines
                </p>

                <hr>

                <strong><i class="fa-solid fa-venus-mars"></i> Gender</strong>

                <p class="text-muted">
                    {{ $student->gender}}
                </p>

                <hr>

                <strong><i class="fa-solid fa-earth-americas"></i> Birthplace</strong>

                <p class="text-muted">
                    {{ $student->birthplace}}
                </p>

                <hr>
              </div>

            </div>
            <div class="button">
                <button type="submit" class="btn btn-success btn-block">Save Profile</button>
              </div>

              {{-- <div class="left">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div> --}}
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </form>
        </div>
      </div>

      <div class="col-md-6">
        <div class="box">

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-body">
                <br>
                <strong><i class="fa fa-location-dot margin-r-5"></i> Address</strong>

                <p class="text-muted">
                    {{ $student->address}}
                </p>

                <hr>
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i> Contact</strong>

                    <p class="text-muted">
                        {{ $student->contact}}
                    </p>

                    <hr>
              {{-- <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr> --}}

              <strong><i class="fa-solid fa-envelope"></i> Email</strong>

              <p class="text-muted">
                  {{ $student->email}}
              </p>
              <hr>



              <strong><i class="fa fa-file-invoice"></i></i> Application #</strong>

              <p class="text-muted">
                # {{ $student->appnum }}
              </p>
              <hr>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          @endforeach
        @endsection

    </div>



</div>


  </section>

