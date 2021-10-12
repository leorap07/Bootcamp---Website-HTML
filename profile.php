<!DOCTYPE html>
<?php
session_start();
require_once 'connect.php';
if(!isset($_SESSION['user'])){
  header("Location: index.php");
  exit;
}

$query = "SELECT * FROM people WHERE userid=?";
$stmt = $pdo->prepare($query);
$stmt->execute([$_SESSION['user']]);
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<?php
ob_start();
session_start();
require_once 'connect.php';
if(!isset($_SESSION['user'])) {
  header("Location: index.php");
  exit;
}

$query = "SELECT * FROM people WHERE userid=?";
$stmt = $pdo->prepare($query);
$stmt->execute([$_SESSION['user']]);
$userRow = $stmt->fetch();
?>

<html>

<div align="center">
<style>
body {
  background-image: url('https://images.pexels.com/photos/1631677/pexels-photo-1631677.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>

<head><title>Leo Rapista: Profile Page</title></head>
<body>
<img src='https://cdn.staticcrate.com/stock-hd/graphics/set-extensions-clouds/graphicscrate-sunset-cloud-2_prev_sm.png'>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
Welcome to the protected page…<?php echo $userRow['fname']; ?>
<h1><style type="text/css">
body{
        color: white
</style></h1>

<table><tr>
<td><a href="index.php">Home</a></td>
<?php
  if($userRow['role'] == "administrator") {
    echo "<td><a href='edit.php'>EDIT</a></td>";
  }
?>
<td><a href="logout.php">Logout</a></td>
</tr>
</table>
</body>
</html>
<?php ob_end_flush(); ?>

                               