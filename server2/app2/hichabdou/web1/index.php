<?php

 //Initialize the session
 session_start();

 //Check if the user is logged in, if not then redirect him to login page
 if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
     header("location: login.php");
     exit;
 }

require_once("./server/db_connect.php");

?>

<!DOCTYPE html>
<!-- The reason why the header and body tags aren't included is beacause they are in the footer and header tempales-->
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Compiled and minified CSS From Materlize Framework-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style>
        .brand-text {
            color: black !important;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
        }
    </style>
</head>
<?php if  (isset($_POST['store'])) $_SESSION['store']=$_POST['store'];  if  (isset($_SESSION['store'])) { ?>
<body class="grey lighten-4">
    <?php include("templates/navbar.php"); ?>
    <div class="container">
        <h1 class="center-align">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to your <?php echo $_SESSION['store']?> dashboard.</h1>
        <p class="center-align">
            <a href="reset-password.php" class="waves-effect waves-light btn">Reset Your Password</a>
            <a href="logout.php" class="waves-effect waves-light btn">Sign Out of Your Account</a>
        </p>
    </div>
 <?php include("templates/footer.php"); ?>
     <?php  } else {?>
choose  a store:
<br>
<form action="/" method="POST">
  <div>
  <input type="radio" id="html" name="store" value="store1" style="font-size: 40px;">
  <label for="html">store1</label></div><div>
  <input type="radio" id="css" name="store" value="store2" style="font-size: 40px;"> 
   <label for="css">store2</label></div><div>
  <input type="radio" id="javascript" name="store" value="store3" style="font-size: 40px;">
<label for="css">store3</label></div>
 <input type="submit" value="Submit">
</form>
 <?php  } ?>
   

</body>

</html>
