@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')


<section class="content">

    <div class="asd"style="width:100%; float:left; margin-top:5%;">
        <ol class="breadcrumb" style="float: right;">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Pie Chart</li>
        </ol>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
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

           <div class="container">
                <h3 align="center">Percentage of Male and Female Employee</h3><br />

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Pie Chart</h3>
                        </div>
                        <div class="panel-body" align="center">
                            <div id="pie_chart" style="width:750px; height:450px;">

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

  @endsection
