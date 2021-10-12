<!doctype html>
<html>
<head>
<title>Example PHP Page</title>
<style>
.myDiv {
  border: 2px solid black;
  background-color: lightgray;
  padding-left: 40px;
  width: 350px;
}
</style>
</head>
<body>
<div align ="center">
<h1>PHP Sample</h1>

<?php if (isset($_POST['username'])) { ?>

Hello <?php echo htmlspecialchars($_POST['username']); ?>,

<?php } else { ?>

Hello, <br>
<p>Please enter your name below.</p>

<?php } ?>

<form action="index2.php" method="post">
<div class="myDiv">
<p>Name: <input type="text" id="name" name="username" /></p>
<input type="submit" value="Submit" />
</div>
</div>
</form>
</body>
</html>
