<?php 
    include('connect.php');
 
 
 $link=mysqli_connect("localhost","root","");
 mysqli_select_db($link,"currente_chats");
 $test=array();
 $count=0;
 $res=mysqli_query($link,"SELECT iyear,COUNT(*) FROM `gtd`GROUP BY iyear;");
 while($row=mysqli_fetch_array($res))
 {
    $test[$count]["label"]=$row["iyear"];
    $test[$count++]["y"]=$row["COUNT(*)"];
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Incidents over time"
	},
	axisY: {
		title: "Attacks"
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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input[type="text"] {
            padding: 8px;
            margin-right: 10px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .result {
            background-color: #fff;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .result hr {
            border: 1px solid #ddd;
        }

        .no-results {
            color: #888;
            font-style: italic;
        }
        table{
            border: 2px solid green;
            border-collapse: collapse;
        }
        td{
            border:2px solid green;
            border-radius: 1rem;
            padding: 5px;
        }
        .chartContainer{
            height: 370px;
            width: 100%;
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

    </style>
    
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
<div class="result">
    <?php
    
    
    $conn = new mysqli($servername, $username, $password, $db_name);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    function extractDataFromDatabase( $conn)
    {
        $query = "SELECT * FROM gtd WHERE summary LIKE '%" . $_GET['pattern'] . "%'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            echo "<table><th>Incident ID</th><th>Date</th><th>Summary</th>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["eventid"] . "</td>";
                echo "<td>" . $row["iday"] ."/". $row["imonth"] ."/". $row["iyear"] . "</td>";
                echo "<td>" . $row["summary"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";

        } else {
            echo "No matching records found in the GTD database.";
        }
    }


    if (isset($_GET['pattern'])) {
        extractDataFromDatabase($conn);
    }
    $conn->close();
    ?>
</div>

</body>
</html>

