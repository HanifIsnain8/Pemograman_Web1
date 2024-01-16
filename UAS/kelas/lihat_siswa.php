<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liha Siswa</title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <a href="kelas.php" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <h2> SISWA </h2>
        <a href="tambah_siswa_kelas.php?id=<?php echo $_GET['id']; ?>" class="btn btn-primary">
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
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $kelas_id = $_GET['id'];
                $koneksi = mysqli_connect("localhost", "root", "", "sekolah");
                $query = "SELECT siswa.nis, siswa.nama
                          FROM siswa
                          INNER JOIN komposisi_kelas ON siswa.nis = komposisi_kelas.siswa_nis
                          WHERE komposisi_kelas.kelas_id_kelas = $kelas_id";

                $result = mysqli_query($koneksi, $query);

                while ($siswa_data = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $siswa_data['nama'] . "</td>";
                    echo "<td>" . $siswa_data['nis'] . "</td>";
                    echo "<td><a href='hapus_siswa_dari_kelas.php?id=" . $siswa_data['nis'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus SISWA ini dari kelas ?\")'>Hapus</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>Invalid request</td></tr>";
            }

            mysqli_close($koneksi);
            ?>
        </tbody>
    </table>
</div>    
</body>
</html>
