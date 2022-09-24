@extends('layouts.userlayout')
@section('content')

<script type="text/javascript">
    var analytics = <?php echo $gender; ?>

    google.charts.load('current', {'packages':['corechart']});

    google.charts.setOnLoadCallback(drawChart);

    function drawChart()
    {
     var data = google.visualization.arrayToDataTable(analytics);
     var options = {
      title : 'Percentage of Male and Female Applicants'
     };
     var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
     chart.draw(data, options);
    }
   </script>

            <div class='col-sm-10' id="pie_chart" style="width:70%;margin-left:20%;margin-top:2%; height:450px;">

            </div>

