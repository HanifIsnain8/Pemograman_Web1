<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kelas</title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_kelas"])) {
    $koneksi = mysqli_connect("localhost", "root", "", "sekolah");

    $id_kelas = $_POST["id_kelas"];
    $nama_kelas = $_POST["nama_kelas"];
    $guru_nip = $_POST["guru_nip"];

    $update_query = "UPDATE kelas SET nama_kelas='$nama_kelas', guru_nip='$guru_nip' WHERE id_kelas = $id_kelas";

    if (mysqli_query($koneksi, $update_query)) {
        echo "Perubahan berhasil disimpan.";
        mysqli_close($koneksi);
        header("Location: kelas.php");
        exit;
    } else {
        echo "Error: " . $update_query . "<br>" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
} else {
}
?>


<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <a href="kelas.php" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <h2>Edit Kelas</h2>
    </div>

    <?php
    $koneksi = mysqli_connect("localhost", "root", "", "sekolah");

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        $id_kelas = $_GET["id"];

        $query = "SELECT * FROM kelas WHERE id_kelas = $id_kelas";
        $result = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($result) == 1) {
            $data = mysqli_fetch_assoc($result);
            ?>
            <form action="" method="POST">
                <input type="hidden" name="id_kelas" value="<?php echo $data['id_kelas']; ?>">
                <div class="mb-3">
                    <label for="nama_kelas" class="form-label">Nama Kelas</label>
                    <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?php echo $data['nama_kelas']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="guru_nip" class="form-label"> Wali Kelas</label>
                    <select class="form-select" id="guru_nip" name="guru_nip" required>
                        <?php
                        $guru_query = "SELECT nip, nama FROM guru";
                        $guru_result = mysqli_query($koneksi, $guru_query);

                        while ($guru_data = mysqli_fetch_array($guru_result)) {
                            $selected = ($guru_data['nip'] == $data['guru_nip']) ? "selected" : "";
                            echo "<option value='" . $guru_data['nip'] . "' $selected>" . $guru_data['nama'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
            <?php
        } else {
            echo "Data eskul tidak ditemukan.";
        }
    } else {
    }

    mysqli_close($koneksi);
    ?>
</div>
</body>
</html>
