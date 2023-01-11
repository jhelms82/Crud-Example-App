<?php
$mysqli = new mysqli('localhost', 'root', '', 'php_crud') or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT * FROM crud_table") or die($mysqli->error);
?>