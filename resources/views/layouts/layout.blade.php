<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap.min.css"
    rel="stylesheet">

    {{-- PIE CHART --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    {{-- LINE CHART --}}
	<link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/echarts.min.js')}}"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/en/c/c9/Seal_of_the_International_State_College_of_the_Philippines.png" type="image/icon type">
    <title>ISCP Admin Portal</title>


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


    {{-- <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body class="hold-transition skin-blue sidebar-mini">
    @include('inc.header')

      <aside class="main-sidebar"style="position:fixed;">
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
          </form>

          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <li class="active treeview">

              <li class="treeview">
                <a href="#"><i class="fa fa-dashboard"></i> <span> Dashboard </span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>

                <ul class="treeview-menu">
                    <li class="treeview">
                      <a href="#"><i class="fa fa-circle-o"></i> Graphic/Charts
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="{{ url('/pie-charts') }}"><i class="fa fa-circle-o"></i> Pie Chart</a></li>
                        <li><a href="{{ url('/line-charts') }}"><i class="fa fa-circle-o"></i> Line Chart</a></li>
                      </ul>
                    </li>
                  </ul>
              </li>

            </li>


            <li class="treeview">
              <a href="#">
                <i class="fa fa-list"></i>
                <span>Application</span>
                <i class="fa fa-angle-left pull-right"></i>
                <span class="pull-right-container">
                </span>
              </a>
              <ul class="treeview-menu">

                <li><a href="{{ url('/students') }}"><i class="fa fa-circle-o"></i> Student Application</a></li>
              </ul>
            </li>



            <li class="treeview">
                <a href="#">
                  <i class="fa-regular fa-envelope"></i>
                  <span>Announcements</span>
                  <i class="fa fa-angle-left pull-right"></i>
                  <span class="pull-right-container">
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ url('/application/add-announcement') }}"><i class="fa fa-circle-o"></i> Create Announcement</a></li>
                  <li><a href="{{ url('/announcements') }}"><i class="fa fa-circle-o"></i>Announcement List</a></li>
                </ul>
              </li>


              <li class="treeview">
                <a href="#">
                  <i class="fa-regular fa-user"></i>
                  <span>User Accounts</span>
                  <i class="fa fa-angle-left pull-right"></i>
                  <span class="pull-right-container">
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ url('/new-admin') }}"><i class="fa fa-circle-o"></i> Add New User Admin</a></li>
                </ul>
              </li>


        </section>
      </aside>
    <main class="content-wrapper">
        @yield('content')
    </main>

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

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script> --}}
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!--  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
    crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js"></script>




</body>

<script type="text/javascript">
    $(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $("#data-table").DataTable({
            serverSide:true,
            processing:true,
            ajax:"{{ url('students') }}",
            columns:[
                {data:'DT_RowIndex',name:'DT_RowIndex'},
                {data:'name',name:'name'},
                {data:'username',name:'username'},
                {data:'gender',name:'gender'},
                {data:'birthday',name:'birthday'},
                {data:'birthplace',name:'birthplace'},
                {data:'contact',name:'contact'},
                {data:'email',name:'email'},
                {data:'address',name:'address'},
                {data:'action',name:'actoin', orderable: false, searchable: false},


            ]
        });

         //modal show and function
     $("#createNewStudent").click(function(){
            $("#student_id").val('');
            $("#studentForm").trigger("reset");
            $("#modalHeading").html("Add Student")
            $('#ajaxModel').modal('show');
        });

        $("#saveBtn").click(function(e){
            e.preventDefault();
            $(this).html('Save');
            var formData = $("#studentForm").serialize();

            console.log(formData);
            $.ajax({
                data:formData,
                url:"{{ route('student.store') }}",
                type:"POST",
                dataType:'json',
                success:function(data){
                    $("#studentForm").trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
                },
                error:function(data){
                    console.log('Error:',data);
                    $("#saveBtn").html('Save');
                }
            });
        });

        $('body').on('click','.deleteStudent',function(){
            var student_id = $(this).data("id");
            confirm("Are you sure you want to delete!");
            $.ajax({
                type:"DELETE",
                url: "{{ route('student.store') }}"+'/'+student_id,
                success:function(data){
                    table.draw();
                },
                error:function(data){
                    console.log('Error:',data);
                }
            });
        });

        $('body').on('click','.editStudent',function(){
            var student_id = $(this).data("id");
            // var url = "{{ route('student.index') }}"+"/"+student_id+"/edit";

            // console.log(url+"/"+student_id);

            $.post("{{ route('student.store') }}"+"/"+student_id+"/edit",function(data){
                console.log(student_id);
                $("#modalHeading").html("Edit Student");
                $('#ajaxModel').modal('show'); // ito yung modal na naoopen diba?
                $("#student_id").val(data.id);
                $("#firstname").val(data.firstname);
                $("#middlename").val(data.middlename);
                $("#lastname").val(data.lastname);
                $("#username").val(data.username);
                $("#email").val(data.email);
                $("#gender").val(data.gender);
                $("#input_age").val(data.age);
                $("#birthday").val(data.birthday);
                $("#birthplace").val(data.birthplace);
                $("#contact").val(data.contact);
                $("#address").val(data.address);
            });
        });

    });
</script>
</html>
