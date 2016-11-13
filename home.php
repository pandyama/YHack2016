  <?php
  if(isset($_POST['submit'])){
    $servername = "localhost";
    $username = "FMAdmin";
    $password = "pwd123";
    $dbname = "appointment";

   //if(isset($_POST['username']) and isset($_POST['password'])){


    $uname = $_POST['username'];
    $pword = $_POST['password'];


    $db = new PDO("mysql:dbname=appointment;host=localhost", $username, $password); 

    echo "Connected";

    $sql = $db->prepare("SELECT * FROM userinfo WHERE username = '$uname' AND 
      password = '$pword' "); 

    $sql->execute();


/*    $query = "SELECT * FROM userinfo WHERE username = '$uname' and password='$pword'";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $count = mysqli_num_rows($result);*/

    if($sql->rowCount() == 1){
      $row = $sql->fetch($sql);
      session_start();
      $_SESSION['username'] = $row['username'];
      $_SESSION['logged']   = TRUE;
      header("Location: maintenance.html");
      exit;
    }
    else{
      header("Location: home.php");
      exit;
    }
  }

  ?>


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

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </head>

  <body>
  <nav class="navbar navbar-static-top c-header-bar">
    <div class="c-header-text-container">
      <img alt="[Fannie Mae logo]" src="http://www.fanniemae.com/resources/img/fannie_mae_logo.gif" class="left">
      <ul class="nav nav-pills">
        <li> <a class="loginBUTTON" href="">LOGIN</a></li>
      </ul>
    </div>
  </nav>

  <div class="login-page">
    <div class="form">
      <form action="" method="POST" >
        <input type="text" name="username" placeholder="Username" />
        <input type="password" name="password" placeholder="Password" />
        <input type="submit" name="submit" class="loginBUTT" value="LOGIN" />
        <p class="message"> Not Registered? <a style="color:#000f2c !important"href="newUser.php">Create an account.</a></p>
      </form>
      </div>
    </div>




  </body>

  </html>