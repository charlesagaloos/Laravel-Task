@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')



<section class="content">
    <div class="asd"style="width:100%; float:left; margin-top:5%;">
        <ol class="breadcrumb" style="float: right;">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Line Chart</li>
        </ol>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="box">



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

           <div class="container">
                <h3 align="center">Daily Student Count</h3><br />

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Line Chart</h3>
                        </div>
                        <div class="panel-body" align="center">
                            <div id="google-line-chart" style="width:750px; height:450px;">

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
