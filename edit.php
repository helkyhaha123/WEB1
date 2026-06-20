<?php
include 'config.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM data_user WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data tidak ditemukan");
}

if (isset($_POST['update'])) {

    $nama  = $_POST['nama'];
    $nomor = $_POST['nomor'];

    // Jika upload foto baru
    if (!empty($_FILES['foto']['name'])) {

        $foto = time() . "_" . $_FILES['foto']['name'];
        $tmp  = $_FILES['foto']['tmp_name'];

        move_uploaded_file($tmp, "upload/" . $foto);

        mysqli_query($conn, "
            UPDATE data_user
            SET nama='$nama',
                nomor='$nomor',
                foto='$foto'
            WHERE id='$id'
        ");

    } else {

        mysqli_query($conn, "
            UPDATE data_user
            SET nama='$nama',
                nomor='$nomor'
            WHERE id='$id'
        ");
    }

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card">
        <div class="card-body">

            <h3>Edit Data</h3>

            <form method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text"
                           name="nama"
                           class="form-control"
                           value="<?= htmlspecialchars($data['nama']) ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label>Nomor</label>
                    <input type="text"
                           name="nomor"
                           class="form-control"
                           value="<?= htmlspecialchars($data['nomor']) ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label>Foto Saat Ini</label><br>
                    <img src="upload/<?= htmlspecialchars($data['foto']) ?>"
                         width="120"
                         class="img-thumbnail">
                </div>

                <div class="mb-3">
                    <label>Ganti Foto (Opsional)</label>
                    <input type="file"
                           name="foto"
                           class="form-control">
                </div>

                <button type="submit"
                        name="update"
                        class="btn btn-primary">
                    Update
                </button>

                <a href="index.php" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

</body>
</html>