
<?php

include("connect.php");
error_reporting(0);

$query= "SELECT * FROM ntcc";

$data= mysqli_query($con,$query);

$total= mysqli_num_rows($data);

if ($total!=0)

{     

while($row=mysqli_fetch_assoc($data))

{
echo "Incident ID: " . $row["eventid"] . "<br>";
            echo "Date: " . $row["iday"] ."/". $row["imonth"] ."/". $row["iyear"] . "<br>";
            echo "Summary: " . $row["summary"] . "<br>";
            echo "<hr>";
}

}

?>
