<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota</title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <a href="eskul.php" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <h2> ANGGOTA </h2>
        <a href="tambah_anggota_eskul.php?id=<?php echo $_GET['id']; ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Anggota
        </a>
    </div>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>NAMA</th>
                <th>NIS</th>
                <th>HAPUS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $koneksi = mysqli_connect("localhost", "root", "", "sekolah");

            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $eskul_id = $_GET['id'];
                $query = "SELECT siswa.nis, siswa.nama
                          FROM siswa
                          INNER JOIN komposisi_eskul ON siswa.nis = komposisi_eskul.siswa_nis
                          WHERE komposisi_eskul.eskul_id_eskul = $eskul_id";

                $result = mysqli_query($koneksi, $query);

                while ($siswa_data = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $siswa_data['nama'] . "</td>";
                    echo "<td>" . $siswa_data['nis'] . "</td>";
                    echo "<td><a href='hapus_anggota_dari_eskul.php?id=" . $siswa_data['nis'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus ANGGOTA ini  ?\")'>Hapus</a></td>";
                    echo "</tr>";
                }
            }
            mysqli_close($koneksi);
            ?>
        </tbody>
    </table>
</div>    
</body>
</html>
