<?php
session_start();
unset($_SESSION['user']);
session_unset();
session_destroy();
header("Location: index.php");
exit;
?>
