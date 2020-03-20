@extends('layouts.master')

@section('title')
Dashboard
@endsection


@section('content')
<?php

$dataPoints = array();
foreach ($profit as $val) {
  array_push($dataPoints, array("y" => $val->profit, "label" => date('M j', strtotime($val->date))));
}
?>
  @push('chart')
  <script>
    window.onload = function() {

      var chart = new CanvasJS.Chart("chartContainer", {
        title: {
          text: "Profit Over last Week"
        },
        axisX: {
          title: "Week",
        },
        axisY: {
          title: "Profit",
          prefix: "$",

        },
        data: [{
          type: "line",
          dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
      });
      chart.render();

    }
  </script>
  @endpush

  <div id="chartContainer" style="padding-top:40px;height: 370px; width: 100%;"></div>
  @endsection
  
  
  
  
  @section('scripts')
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

  @endsection