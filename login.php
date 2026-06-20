<?php
include 'config.php';

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query(
        $conn,
        "SELECT * FROM users_login
         WHERE username='$username'"
    );

    $user = mysqli_fetch_assoc($query);

    if($user && password_verify(
        $password,
        $user['password']
    )){

        $_SESSION['login'] = true;
        $_SESSION['nama'] = $user['nama'];

        header("Location:dashboard.php");
        exit;
    }

    echo "<script>alert('Login gagal')</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

<div class="card col-md-5 mx-auto">
<div class="card-body">

<h3>Login</h3>

<form method="POST">

<input type="text"
       name="username"
       class="form-control mb-2"
       placeholder="Username">

<input type="password"
       name="password"
       class="form-control mb-2"
       placeholder="Password">

<button class="btn btn-primary w-100"
        name="login">
    Login
</button>

<a href="register.php">
    Buat akun baru
</a>

</form>

</div>
</div>

</div>
</body>
</html>