<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <style>
        .button-wrapper {
        position: relative;
        width: 150px;
        text-align: center;
        margin: auto;
        }

        .button-wrapper span.label {
        position: relative;
        z-index: 0;
        display: inline-block;
        width: 100%;
        background: #00bfff;
        cursor: pointer;
        color: #fff;
        padding: 10px 0;
        text-transform:uppercase;
        font-size:12px;
        }

        #upload {
            display: inline-block;
            position: absolute;
            z-index: 1;
            width: 100%;
            height: 20px;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- PIE CHART --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />


    {{-- LINE CHART --}}
	<link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/echarts.min.js')}}"></script>





    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> --}}

    {{-- fonts --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Tell the browser to be responsive to screen width -->
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}} ">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}} ">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}} ">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}} ">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}} ">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('bower_components/morris.js/morris.css')}} ">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('bower_components/jvectormap/jquery-jvectormap.css')}} ">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}} ">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}} ">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}} ">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->



    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}


    {{-- <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> --}}
</head>
<body class="hold-transition skin-blue sidebar-mini">
    @include('inc.userheader')


      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
                <img src="https://upload.wikimedia.org/wikipedia/en/c/c9/Seal_of_the_International_State_College_of_the_Philippines.png" class="img-circle" alt="User Image">

              </div>
              <div class="pull-left info">
                <span>International State</span>
                <br>
                <span>Campus of The</span>
                <br>
                <span>Philippines</span>
              </div>

          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <li class="active treeview">
              <li class="treeview">
                <li><a href="{{ url('/students/dashboard/') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></li>
                </a>
              </li>
            </li>

            <li class="active treeview">
                <li class="treeview">
                  <li><a href="{{ url('/students/profile/') }}"><i class="fa-regular fa-user"></i> <span>Profile</span></li>
                  </a>
                </li>
              </li>
        </section>
        <!-- /.sidebar -->
      </aside>


    <main class="content-wrapper" style="min-height: 50%;">
        @yield('content')
    </main>
    <footer class="main-footer">
            <div class="pull-right hidden-xs">
              <b>Version</b> 2.4.18
            </div>
            <strong>Copyright &copy; 2022-2025 <a href="https://adminlte.io">ISCP</a>.</strong> All rights
            reserved.
          </footer>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> --}}


    <!-- jQuery 3 -->
    <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Morris.js charts -->
    <script src="{{asset('bower_components/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('bower_components/morris.js/morris.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
    <!-- jvectormap -->
    <script src="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- datepicker -->
    <script src="{{asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <!-- Slimscroll -->
    <script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('dist/js/demo.js')}}"></script>



</body>

{{-- MODAL FUNCTION START --}}
<script>
    $(document).ready(function () {

    /* When click New student button */
    $('#new-student').click(function () {
        $('#btn-save').val("create-student");
        $('#student').trigger("reset");
        $('#studentCrudModal').html("Add New Student");
        $('#crud-modal').modal('show');
    });

    /* Edit student */
    $('body').on('click', '#edit-student', function () {
        var student_id = $(this).data('id');
        $.get('students/'+student_id+'/edit', function (data) {
            $('#studentCrudModal').html("Edit Student");
            $('#btn-update').val("Update");
            $('#btn-save').prop('disabled',false);
            $('#crud-modal').modal('show');
            $('#id').val(data.id);
            $('#firstname').val(data.firstname);
            $('#middlename').val(data.middlename);
            $('#lastname').val(data.lastname);
            $('#gender').val(data.gender);
            $('#birthday').val(data.birthday);
            $('#birthplace').val(data.birthplace);
            $('#contact').val(data.contact);
            $('#email').val(data.email);
            $('#address').val(data.address);
        })
    });

});

    </script>
</html>
