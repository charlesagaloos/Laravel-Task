@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')

<style>
    body{
        /* overflow-y: hidden !important */
        background-color: #001c42;
    }

    .instagram{
        width:30%;
        height:100%;
        margin:auto;
        margin-bottom:2rem;
        border-radius: 25px;
        background: rgba(0,0,0,.1)

    }
  .scrollable{
    /* height:500px;
    margin:auto;
    overflow-y: scroll; */
    height:700px;
    overflow-y: scroll;
    border-radius: 25px;
    border: 2px solid rgba(20,87,179,.6);
    padding: 15px;
    background-color:rgba(255,255,255,.2);

  }

  #style-2::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #001c42;
}

#style-2::-webkit-scrollbar
{
	width: 10px;
	background-color: #001c42;
}

#style-2::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #003d92;
}

  .portal{
    float:left;
    width:20%;
    margin-top:10%;
    margin-left:10%;
    margin-bottom: 2rem;
    box-shadow: 1px 5px 5px rgba(0,0,0,.6);
  }
  .ads{
    width:20%;
    /* margin:auto; */
    /* margin-top:10%; */
    margin-top:10%;
    float: right;
    margin-right:10%;
    margin-bottom: 2rem;
    box-shadow: 1px 5px 5px rgba(0,0,0,.6);

  }


  .course{
    width:40%;
    /* float:left; */
    float:left;
    margin-bottom: 2rem;
  }
  .myCarousel{

  }
  .hymn{
    text-align:center;
    width:auto;
    margin-top:43%;
  }
  .video-hymn{
    margin-bottom: 2rem;
  }
</style>
<section class="content">

    <div class="asd"style="width:100%; float:left; margin-top:5%;">
        <ol class="breadcrumb" style="float: right;">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        </ol>
    </div>
    <div class="dashboardhead" style="width:25%; float: left;">
        <h1>
            Dashboard
        </h1>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="box" style="background-color: #001c42; box-shadow: 1px 5px 5px rgba(0,0,0,.6);">
          <!-- /.box-header -->

          <script type="text/javascript">
            var analytics = <?php echo $gender; ?>

            google.charts.load('current', {'packages':['corechart']});

            google.charts.setOnLoadCallback(drawChart);

            function drawChart()
            {
             var data = google.visualization.arrayToDataTable(analytics);
             var options = {
              title : 'Percentage of Male and Female Employee'
             };
             var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
             chart.draw(data, options);
            }
           </script>


        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Month Name', 'Added Student Count'],

                    @php
                    foreach($lineChart as $d) {
                        echo "['".$d->month_name."', ".$d->count."],";
                    }
                    @endphp
            ]);



            var options = {
              title: 'Added Student Month Wise',
              curveType: 'function',
              legend: { position: 'bottom' }
            };

              var chart = new google.visualization.LineChart(document.getElementById('google-line-chart'));

              chart.draw(data, options);
            }
        </script>

           <div class="container" style="background-color: #001c42; color:white;">
                <h3 align="center">Charts</h3><br />
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Percentage of Male and Female Employee</h3>
                            </div>
                                <div class="panel-body" align="center">
                                    <div id="pie_chart">

                                    </div>
                                </div>
                            </div>
                    </div>


                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Daily Student Count</h3>
                            </div>
                                <div class="panel-body" align="center">
                                    <div id="google-line-chart">
                                    </div>
                                </div>
                            </div>
                    </div>



                </div>
            </div>

          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>


  <div class="content-scrollable">


        <div id="myCarousel" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner" style="margin-bottom: 2rem;">
                <div class="item active">
                  <img src="{{url('/images/uniform.jfif')}}" alt="welcome" style="width:80%; object-fit:cover; margin:auto;" >
                </div>

                <div class="item">
                  <img src="{{url('/images/class.jfif')}}" alt="cover" style="width:80%; object-fit:cover; margin:auto;">
                </div>
            </div>
        </div>
    </div>



  @endsection
