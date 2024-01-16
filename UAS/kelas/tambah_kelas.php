<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kelas</title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_kelas = $_POST["nama_kelas"];
    $kapasitas = $_POST["kapasitas"];
    $wali_kelas = $_POST["wali_kelas"];


    $koneksi = mysqli_connect("localhost", "root", "", "sekolah");

    $query = "INSERT INTO kelas (kapasitas, nama_kelas, guru_nip) VALUES ('$kapasitas', '$nama_kelas', '$wali_kelas')";
    mysqli_query($koneksi, $query);

    mysqli_close($koneksi);

    header("Location: kelas.php");
    exit;
}
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <a href="kelas.php" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <h2>Tambah Kelas</h2>
    </div>

    <form action="" method="POST">
        <div class="mb-3">
            <label for="nama_kelas" class="form-label">Nama Kelas</label>
            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required>
        </div>
        <div class="mb-3">
            <label for="kapasitas" class="form-label">Kapasitas</label>
            <input type="number" class="form-control" id="kapasitas" name="kapasitas" required>
        </div>
        <div class="mb-3">
            <label for="wali_kelas" class="form-label">Wali Kelas</label>
            <select class="form-select" id="wali_kelas" name="wali_kelas" required>
                <?php
                $koneksi = mysqli_connect("localhost", "root", "", "sekolah");
                $guru_query = "SELECT nip, nama FROM guru";
                $guru_result = mysqli_query($koneksi, $guru_query);

                while ($guru_data = mysqli_fetch_array($guru_result)) {
                    echo "<option value='" . $guru_data['nip'] . "'>" . $guru_data['nama'] . "</option>";
                }

                mysqli_close($koneksi);
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>

</div>    
</body>
</html>
