<?php
$koneksi = mysqli_connect("localhost", "root", "", "sekolah");

$nis = $_GET['id'];

$cekkelas = "SELECT * FROM komposisi_kelas WHERE siswa_nis = '$nis'";
$resultkelas = mysqli_query($koneksi, $cekkelas);

$cekEskul = "SELECT * FROM komposisi_eskul WHERE siswa_nis = '$nis'";
$resultEskul = mysqli_query($koneksi, $cekEskul);

if (mysqli_num_rows($resultkelas) > 0 || mysqli_num_rows($resultEskul) > 0) {
    echo "Peringatan: Siswa dengan NIS " . $nis . " terdaftar di rombel atau eskul. Klik OK untuk melanjutkan penghapusan.";
    echo '<script>
            var konfirmasi = confirm("Siswa ini terdaftar di kelas atau eskul. Lanjutkan penghapusan?");
            if (konfirmasi) {
                window.location.href = "proses_hapus_siswa.php?id=' . $nis . '";
            } else {
                window.location.href = "siswa.php";
            }
          </script>';
} else {
    $hapus = "DELETE FROM siswa WHERE nis = '$nis'";
    
    if (mysqli_query($koneksi, $hapus)) {
        echo "Data siswa dengan NIS " . $nis . " berhasil dihapus.";
        header("Location: siswa.php");
        exit();
    } else {
        echo "Gagal menghapus data siswa.";
    }
}

mysqli_close($koneksi);
?>
