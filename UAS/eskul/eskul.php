<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <a href="..\home.php" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <h2>Data Ekstrakulikuler</h2>
        <a href="tambah_eskul.php" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Ekstrakulikuler
        </a>
    </div>
    <table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>NAMA EKSTRAKURIKULER</th>
            <th>GURU PEMBIMBING</th>
            <th>ANGGOTA</th>
            <th>EDIT</th>
            <th>HAPUS</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $koneksi = mysqli_connect("localhost", "root", "", "sekolah");

        $tampil = "SELECT eskul.id_eskul, eskul.nama_eskul, guru.nama AS nama_guru
           FROM eskul
           INNER JOIN guru ON eskul.guru_nip = guru.nip";


        $hasil  = mysqli_query($koneksi, $tampil);
        while ($data = mysqli_fetch_array($hasil)) {
            echo "<tr>";
            echo "<td>" . $data['nama_eskul'] . "</td>";
            echo "<td>" . $data['nama_guru'] . "</td>";
            echo "<td><a href='lihat_anggota.php?id=" . $data['id_eskul'] . "' class='btn btn-primary btn-sm'>Lihat</a></td>";
            echo "<td><a href='edit_eskul.php?id=" . $data['id_eskul'] . "' class='btn btn-primary btn-sm'>Edit</a></td>";
            echo "<td><a href='hapus_eskul.php?id=" . $data['id_eskul'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus siswa ini?\")'>Hapus</a></td>";
            echo "</tr>";
        }
        mysqli_close($koneksi);
        ?>
    </tbody>
</table>


</div>    
</body>
</html>