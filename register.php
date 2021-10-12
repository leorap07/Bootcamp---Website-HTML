<!DOCTYPE html>

<?php
session_start();

if( isset($_SESSION['user'])!="" ){
header("Location: profile.php");
}

include_once 'connect.php';

if ( isset($_POST['sub']) ) {
  $username = trim($_POST['username']);
  $fname = trim($_POST['fname']);
  $lname = trim($_POST['lname']);
  $pass = trim($_POST['password']);
  $password = hash('sha256', $pass);


  $query = "insert into people(username,fname,lname,pass) values(?, ?, ?, ?)";
  $stmt = $pdo->prepare($query);
  $stmt->execute([$username,$fname,$lname,$password]);
  $rowsAdded = $stmt->rowCount();

  if ($rowsAdded == 1) {
    $message = "Success! Proceed to login";
    unset($fname);
    unset($lname);
    unset($pass);
    header("Location: login.php");
  }
  else
  {
    $message = "Failed! For some reason";
  }
}
?>

<html>
<head>
<title> Leo Rapista: Account Creation Page </title>
</head>

<script>
function Validate() {

    var x = document.forms["accountcreate"]["fname"].value;
    if (x == "") {
        alert ("Please provide your First Name");
        return false;
    }
    var y = document.forms["accountcreate"]["lname"].value;
    if (y == "") {
        alert ("Please provide your Last Name");
        return false;
    }
    var w = document.forms["accountcreate"]["username"].value;
    if (w == "") {
        alert("Please choose a username");
        return false; 
    }
    var p = document.forms["accountcreate"]["password"].value;
    if (p == "") {
        alert ("Please provide your password");
        return false;
    }
    plength = p.length;
    if (plength < 10) {
        alert("Your password is not long enough");
        return false;
    }
}
</script>


<body>

<style>
body {
  background-image: url('https://images.pexels.com/photos/1631677/pexels-photo-1631677.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>

<div align="center">
<br></br>
<img src="https://cengage.force.com/resource/1607465003000/loginIcon" height="200" width="200">
<br></br>
<h1> Register for your account here: </h1>
<h1><style type="text/css">
body{
        color: white}
 </style></h1>


<form action="" method="post" name="accountcreate" onsubmit="return Validate()">
<div class="myDiv">
        Create your account: </p>
        First Name: <input type="text" name="fname"> </input>
        Last  Name: <input type="text" name="lname"> </input>
        Username: <input type="text" name="username"> </input>
        Password:  <input type="password" name="password"> </input>
        <br></br>
        <input type="submit" value="Create Account" name="sub"> </input>
<br></br>
</form>
</div>
<br></br>
<p> Here is the link to <a href ="index.php">Go Back</a> </p>
<p> Here is the link to <a href ="login.php">Login</a> </p>
</div>

<style>
body {
  background-image: url('https://images.pexels.com/photos/1631677/pexels-photo-1631677.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>

<div align="center">
<br></br>
<img src="https://cengage.force.com/resource/1607465003000/loginIcon" height="200" width="200">
<br></br>
<h1> Register for your account here: </h1>
<h1><style type="text/css">
body{
        color: white}
        </style></h1>


<form action="" method="post" name="accountcreate" onsubmit="return Validate()">
<div class="myDiv">
        Create your account: </p>
        First Name: <input type="text" name="fname"> </input>
        Last  Name: <input type="text" name="lname"> </input>
        Username: <input type="text" name="username"> </input>
        Password:  <input type="password" name="password"> </input>
        <br></br>
        <input type="submit" value="Create Account" name="sub"> </input>
<br></br>
</form>
</div>
<br></br>
<p> Here is the link to <a href ="index.php">Go Back</a> </p>
<p> Here is the link to <a href ="login.php">Login</a> </p>
</div>
</html>
                                      