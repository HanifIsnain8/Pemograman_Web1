<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body>

<?php
$koneksi = mysqli_connect("localhost", "root", "", "sekolah");

if (isset($_GET['id'])) {
    $nip = $_GET['id'];
    $query = "SELECT * FROM guru WHERE nip = '$nip'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        die("Guru tidak ditemukan");
    }
} else {
    die("NIP tidak ditemukan");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $gender = $_POST['gender'];

    $update_query = "UPDATE guru SET nama='$nama', alamat='$alamat', tanggal_lahir='$tanggal_lahir', gender_id_gender='$gender' WHERE nip='$nip'";
    
    if (mysqli_query($koneksi, $update_query)) {
        echo "Data guru berhasil diupdate!";
        header("Location: guru.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

?>
<div class="container mt-5">
    <h2>Edit Guru</h2>
    <form action="" method="post">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="nis" class="form-label">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip" value="<?php echo $data['nip']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?php echo $data['alamat']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="0" <?php if ($data['gender_id_gender'] == '0') echo 'selected'; ?>>Perempuan</option>
                <option value="1" <?php if ($data['gender_id_gender'] == '1') echo 'selected'; ?>>Laki-laki</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<a href="guru.php">Kembali ke Daftar Guru</a>

</body>
</html>
