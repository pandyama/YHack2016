<!DOCTYPE html>
<html>

<head>
 <title>Home</title>

 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">

 <meta name="viewport" content="width=device-width, initial-scale=1">

 <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

 <!-- Optional theme -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


 <link rel="stylesheet" type="text/css" href="home.css">

 <script type="text/javascript" src="map.js"></script>

</head>

<body>

   <nav class="navbar navbar-static-top c-header-bar">
    <div class="c-header-text-container">
      <img alt="[Fannie Mae logo]" src="http://www.fanniemae.com/resources/img/fannie_mae_logo.gif" class="left">
      <ul class="nav nav-pills">
        <li> <a href="home.php"> LOGOUT </a></li>
        <li> <a  class="loginBUTTON" href="schedule.php"> SCHEDULE </a></li>
        <li> <a href="maintenance.html"> MAINTENANCE </a></li>
        <li> <a href="report.html"> REPORT </a></li>
      </ul>
    </div>
  </nav>   

<div id="live" style="float: right; width:40%;height:250px"></div>

<?php
$servername = "localhost";
$username = "puppies_admin";
$password = "diary123";
$dbname = "appointment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT Street, City, State, Vendor, date_pick, time_pick FROM submission";
$result = $conn->query($sql);

if($result->num_rows > 0){
  $row = 0;

  echo "<table id=first>
  <tr id=one>
    <th colspan=2>PROPERTY INFO</th>
    <th>&nbspVENDOR</th>
    <th colspan=2>&nbsp &nbsp SCHEDULE</th>
  </tr>";
  while($row = $result->fetch_assoc()){
    echo "<tr = two>
    <td>".$row["Street"].", &nbsp</td>
    <td>".$row["City"]." ".$row["State"]. "&nbsp &nbsp &nbsp</td>
    <td> ".$row["Vendor"]."</td>
    <td> &nbsp &nbsp".$row["date_pick"]." &nbsp".$row["time_pick"]."</td>
  </tr>";
}
echo "</table>";
}
else{
  echo "0 results";
}
$conn->close();
?>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwj1g0AnNELooj8g_S4Dd7eRMk6w-mk-4&callback=liveMap"></script>



</body>

</html>






