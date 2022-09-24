@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')

<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    </ol>
</section>

<section class="content">
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



  @endsection
