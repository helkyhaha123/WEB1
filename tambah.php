<?php
include 'config.php';

if(!isset($_SESSION['login'])){
    header("Location:login.php");
    exit;
}
?>
<?php
include 'config.php';

if(isset($_POST['simpan'])){

    $nama = $_POST['nama'];
    $nomor = $_POST['nomor'];

    $foto = $_FILES['foto']['name'];
    $tmp  = $_FILES['foto']['tmp_name'];

    move_uploaded_file($tmp, "upload/".$foto);

    mysqli_query($conn,"
        INSERT INTO data_user(nama, nomor, foto)
        VALUES('$nama','$nomor','$foto')
    ");

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Data</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

<h2>Tambah Data</h2>

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">
<label>Nama</label>
<input type="text"
       name="nama"
       class="form-control"
       required>
</div>

<div class="mb-3">
<label>Nomor</label>
<input type="text"
       name="nomor"
       class="form-control"
       required>
</div>

<div class="mb-3">
<label>Foto</label>
<input type="file"
       name="foto"
       class="form-control"
       required>
</div>

<button type="submit"
        name="simpan"
        class="btn btn-success">
    Simpan
</button>

<a href="index.php" class="btn btn-secondary">
    Kembali
</a>

</form>

</div>

</body>
</html>