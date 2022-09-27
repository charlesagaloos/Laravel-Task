@php
    use App\Students;
@endphp
<style>
    .main-header{
        /* position:sticky; */
    }

</style>
<header class="main-header" style="position: fixed; width:100%;">
    <!-- Logo -->
    <a href="https://www.iscphilippines.com/home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>IS</b>CP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="font-size:9px;"><b>International State Campus of The Philippines</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

            @foreach ($students as $student)


        {{-- @php
            $data = Students::where('appnum', '=',Auth::user()->appnum)->first();
            $pic = Students::find($data->id);
            $currentpic = str_replace('public\images/','public/images/',$pic->profile_pic);
        @endphp --}}

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ URL::to($student->profile_pic) }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->firstname }}</span>
              <i class="fa-solid fa-caret-down"></i>

            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ URL::to($student->profile_pic) }}" class="img-circle" alt="User Image">

                <p>
                    {{ Auth::user()->firstname.' '. Auth::user()->lastname }}
                </p>
                <span href="#"><i class="fa fa-circle text-success"></i> Online</span>
              </li>
              <!-- Menu Body -->
              {{-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li> --}}
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ url('/students/profile/') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                   {{ __('Logout') }}
               </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          {{-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> --}}
        </ul>
        @endforeach
      </div>
    </nav>
  </header>

