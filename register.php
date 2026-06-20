<?php
include 'config.php';

if(isset($_POST['register'])){

    $nama = $_POST['nama'];
    $username = $_POST['username'];

    $password = password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    mysqli_query($conn,"
        INSERT INTO users_login
        (nama,username,password)
        VALUES
        ('$nama','$username','$password')
    ");

    echo "<script>
            alert('Registrasi berhasil');
            location='login.php';
          </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

<div class="card col-md-5 mx-auto">
<div class="card-body">

<h3>Register</h3>

<form method="POST">

<input type="text"
       name="nama"
       class="form-control mb-2"
       placeholder="Nama"
       required>

<input type="text"
       name="username"
       class="form-control mb-2"
       placeholder="Username"
       required>

<input type="password"
       name="password"
       class="form-control mb-2"
       placeholder="Password"
       required>

<button name="register"
        class="btn btn-success w-100">
    Daftar
</button>

<a href="login.php">
    Sudah punya akun?
</a>

</form>

</div>
</div>

</div>
</body>
</html>