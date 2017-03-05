<?php
//Get data

$SQL = "SELECT COUNT(cat_id) AS amount FROM event_categories";
$result = $conn->query($SQL);
$cat_amount = mysqli_fetch_assoc($result)['amount'];

$cat_array = array();

for($i = 1; $i <= $cat_amount; $i++){
    $SQL = "SELECT COUNT(event_cat) AS amount FROM events WHERE event_cat=$i";
    $result = $conn->query($SQL);
    $cat_array[$i] = mysqli_fetch_assoc($result)['amount'];
}

?>
<script>
$(function () {

  'use strict';

  //-------------
  //- PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = [
    <?php 
        for($i = 1; $i <=$cat_amount; $i++){
            $SQL = "SELECT cat_name, cat_color FROM event_categories WHERE cat_id=$i";
            $result = $conn->query($SQL);
            $row = mysqli_fetch_assoc($result);
            
            echo "{";
                echo "value: '" . $cat_array[$i] . "',";
                echo "color: '" . $row['cat_color'] . "',";
                echo "highlight: '" . $row['cat_color'] . "',";
                echo "label: '" . $row['cat_name'] . "'";
            echo "}";
            if($i != $cat_amount){
                echo ",";
            }
            
        }
    ?>
  ];
  var pieOptions = {
    //Boolean - Whether we should show a stroke on each segment
    segmentShowStroke: true,
    //String - The colour of each segment stroke
    segmentStrokeColor: "#fff",
    //Number - The width of each segment stroke
    segmentStrokeWidth: 1,
    //Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout: 50, // This is 0 for Pie charts
    //Number - Amount of animation steps
    animationSteps: 150,
    //String - Animation easing effect
    animationEasing: "easeOutBounce",
    //Boolean - Whether we animate the rotation of the Doughnut
    animateRotate: true,
    //Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale: true,
    //Boolean - whether to make the chart responsive to window resizing
    responsive: true,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: false,
    //String - A legend template
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
    //String - A tooltip template
    tooltipTemplate: "<%=value %> <%=label%>"
  };
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  pieChart.Doughnut(PieData, pieOptions);
  //-----------------
  //- END PIE CHART -
  //-----------------
});
</script>