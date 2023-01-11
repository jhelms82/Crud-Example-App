<?php
session_start();
$name = '';
$location = '';
$update = false;



$mysqli = new mysqli('localhost', 'root', '', 'php_crud') or die(mysqli_error($mysqli));

//Insert Query
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];

    $mysqli->query("INSERT INTO crud_table (name, location) VALUES ('$name', '$location')") or
        die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";
    header('location: index.php');
}


//Delete query
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE from crud_table WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header('location: index.php');
}

//Edit Query
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM crud_table WHERE id=$id") or die($mysqli->error);
    if ($result && $row = $result->fetch_array()) {
        $name = $row['name'];
        $location = $row['location'];
    }
}


//update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];

    $mysqli->query("UPDATE crud_table SET name='$name', location='$location' WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header('location: index.php');
}