<!DOCTYPE html>
<?php
session_start();
if( isset($_SESSION['user'])!="" ){
   header("Location: index.php");
}
include_once 'connect.php';

if ( isset($_POST['sub']) ) {
    $username = trim($_POST['username']);
    $pass = trim($_POST['password']);
    $password = hash('sha256', $pass);

    $query = "select userid, username, pass from people where username=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username]);
    $count = $stmt->rowCount();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if( $count == 1 && $row['pass']==$password ) {
        $_SESSION['user'] = $row['userid'];
        header("Location: profile.php");
    }
    else {
        $message = "Invalid Login";
    }
    $_SESSION['message'] = $message;
}
?>

<html>
<style>
body {
  background-image: url('https://images.pexels.com/photos/1631677/pexels-photo-1631677.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>

<head>

<head>
<title> Leo Rapista: Login Page </title>
</head>

<script>
function Validate() {
    var w = document.forms["login"]["username"].value;
    if (w == "") {
        alert("Please choose a username");
        return false; 
    }
    var p = document.forms["login"]["password"].value;
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
<?php
  if ( isset($message) ) {
    echo $message;
  }
?>

<h1><style type="text/css">
body{
        color: white
</style></h1>
 
<div align="center">
<br></br>
<img src ="https://spwww.sccpss.com/PublishingImages/login1.png" width="200" height="100"  >

<div class="myDiv" background="translucent" >
<form  action="login.php"  method="post" name="login" onsubmit="return Validate()">

        <p> Login to your account: </p>
        Username: <input type="text" name="username" > </input>
        Password: <input type="password" name="password" > </input>
        <br></br>
        <input type="submit" value="login" name="sub"> </input>

<br></br>
</form>
</div>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<p> This is the link to <a href ="index.php"> Main Page </a>
<p> This is the link to <a href ="register.php"> Account Creation </a> </p>
</div>
</body>
</html>
