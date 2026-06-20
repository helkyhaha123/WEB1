<?php
include 'config.php';

if(!isset($_SESSION['login'])){
    header("Location:login.php");
    exit;
}
?>
<?php

include 'config.php';

$id = $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM data_user WHERE id='$id'"
);

header("Location:index.php");