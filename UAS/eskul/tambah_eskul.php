<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Eskul</title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $koneksi = mysqli_connect("localhost", "root", "", "sekolah");

    $nama_eskul = $_POST["nama_eskul"];
    $guru_nip = $_POST["guru_nip"];

    $insert_query = "INSERT INTO eskul (nama_eskul, guru_nip) VALUES ('$nama_eskul', '$guru_nip')";

    if (mysqli_query($koneksi, $insert_query)) {
        echo "Eskul berhasil ditambahkan.";
        mysqli_close($koneksi);
        header("Location: eskul.php");
        exit;
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($koneksi);
    }
}
?>


<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <a href="eskul.php" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <h2>Tambah Eskul</h2>
    </div>

    <form action="" method="POST">
        <div class="mb-3">
            <label for="nama_eskul" class="form-label">Nama Eskul</label>
            <input type="text" class="form-control" id="nama_eskul" name="nama_eskul" required>
        </div>
        <div class="mb-3">
            <label for="guru_nip" class="form-label">Guru Pembimbing </label>
            <select class="form-select" class="form-control" id="guru_nip" name="guru_nip" required>
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
        <button type="submit" class="btn btn-primary">Tambah Eskul</button>
    </form>
</div>    
</body>
</html>
