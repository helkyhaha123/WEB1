<?php
include 'config.php';

if(!isset($_SESSION['login'])){
    header("Location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<nav class="navbar navbar-dark bg-dark">
<div class="container">

<span class="navbar-brand">
Dashboard CRUD
</span>

<a href="logout.php"
   class="btn btn-danger">
    Logout
</a>

</div>
</nav>

<div class="container mt-5">

<div class="card">
<div class="card-body">

<h3>
Selamat Datang,
<?= $_SESSION['nama']; ?>
</h3>

<p>
Anda berhasil login.
</p>

<a href="index.php"
   class="btn btn-primary">
    Kelola Data
</a>

</div>
</div>

</div>

</body>
</html>