<?php
include 'config.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$data = mysqli_query($conn, "SELECT * FROM data_user");
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Data User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Data User</h2>

    <!-- Video YouTube -->
    <div class="card shadow mb-4">
        <div class="card-body p-0">
            <div class="ratio ratio-16x9">
                <iframe
                    src="https://c.top4top.io/m_3822868zx1.mp4"
                    title="YouTube video player"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>

    <a href="tambah.php" class="btn btn-primary mb-3">
        Tambah Data
    </a>

    <table class="table table-bordered table-striped">
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Nomor</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        while($row = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?= $no++ ?></td>

            <td>
                <img src="upload/<?= $row['foto'] ?>"
                     width="80"
                     class="img-thumbnail">
            </td>

            <td><?= $row['nama'] ?></td>
            <td><?= $row['nomor'] ?></td>

            <td>
                <a href="edit.php?id=<?= $row['id'] ?>"
                   class="btn btn-warning btn-sm">
                    Edit
                </a>

                <a href="hapus.php?id=<?= $row['id'] ?>"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Hapus data?')">
                    Hapus
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <!-- Tanda Tangan -->
    <div class="row mt-5">
        <div class="col-md-6 offset-md-6 text-center">
            <p>Pasartanahtinggi, <?= date('d F Y') ?></p>
            <p>Mengetahui,</p>

            <div style="height:100px;"></div>

            <hr style="width:250px; margin:auto;">
            <strong>Nama Penanggung Jawab</strong>
        </div>
    </div>

</div>

</body>
</html>