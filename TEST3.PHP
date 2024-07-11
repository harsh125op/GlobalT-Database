<?php
 
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"currente_chats");
$test=array();
$count=0;
$res=mysqli_query($link,"SELECT attacktype1_txt,COUNT(*) FROM `gtd` GROUP BY attacktype1_txt");
while($row=mysqli_fetch_array($res))
{
   $test[$count]["label"]=$row["attacktype1_txt"];
   $test[$count++]["y"]=$row["COUNT(*)"];
}
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "ATTACK TYPES"
	},
	axisY: {
		title: "Attack TYPE"
	},
	data: [{
		type: "column",
        yValueFormatString: "#,##0.## Attacks",
		dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
<STYle>
	 input[type="submit"] {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
        }
	ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
}

li {
  float: left;
}

li a {
  display: block;
  padding: 8px;
  background-color: #dddddd;
}
</STYle>
</head>
<body>
<ul>
<li><form action="index.php" method="GET">
<input type="submit" value="Home"> </form></li>
  <li><form action="TEST3.php" method="GET">
<input type="submit" value="Target Type"> </form></li>
  <li><form action="TEST.php" method="GET">
<input type="submit" value="ATTACK PER COUNTRY"> </form></li>
  <li><form action="TEST2.php" method="GET">
<input type="submit" value="ATTACK TYPE"> </form></li>
  <li><form action="TEST4.php" method="GET">
<input type="submit" value="WEAPON TYPE"> </form></li>
</ul>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<form action="TEST2.php" method="GET">
CLICK TO VIEW GRAPH FOR TARGET TYPE:
<input type="submit" value="click me"> </form>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>                          