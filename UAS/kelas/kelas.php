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
        <h2>Data Kelas</h2>
        <a href="tambah_kelas.php" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Kelas
        </a>
    </div>
    <table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>NAMA KELAS</th>
            <th>WALI KELAS</th>
            <th>SISWA</th>
            <th>EDIT</th>
            <th>HAPUS</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $koneksi = mysqli_connect("localhost", "root", "", "sekolah");
        
        $tampil = "SELECT kelas.id_kelas, kelas.nama_kelas, kelas.kapasitas, guru.nama AS nama_guru
                    FROM kelas
                    INNER JOIN guru ON kelas.guru_nip = guru.nip";

                   
        $hasil  = mysqli_query($koneksi, $tampil);
        
        while ($data = mysqli_fetch_array($hasil)) {
            echo "<tr>";
            echo "<td>" . $data['nama_kelas'] . "</td>";
            echo "<td>" . $data['nama_guru'] . "</td>";
            echo "<td><a href='lihat_siswa.php?id=" . $data['id_kelas'] . "' class='btn btn-primary btn-sm'>Lihat</a></td>";
            echo "<td><a href='edit_kelas.php?id=" . $data['id_kelas'] . "' class='btn btn-primary btn-sm'>EDIT</a></td>";
            echo "<td><a href='hapus_kelas.php?id=" . $data['id_kelas'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus KELAS ini?\")'>Hapus</a></td>";
            echo "</tr>";
        }
        mysqli_close($koneksi);
        ?>
    </tbody>
</table>

</div>    
</body>
</html>