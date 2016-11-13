  <!DOCTYPE html>
<html>

<head>
  <title>Home</title>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1">



</head>

<body>

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

    $sql = "INSERT INTO submission(Street, City, State, Vendor, date_pick, time_pick)
    VALUES ('$_POST[street]', '$_POST[city]', '$_POST[state]', '$_POST[vendor]', '$_POST[date]', '$_POST[time]') ";

    if ($conn->query($sql) === TRUE) {
      echo "<script type='text/javascript'> alert('Submitted Successfully');</script>";
      $conn->close();
      sleep(4);
      header('Location: maintenance.html', true, 303);
      exit;
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
  ?>


</body>
</html>







