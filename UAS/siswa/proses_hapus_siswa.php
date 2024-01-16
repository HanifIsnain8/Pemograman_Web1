<?php
$koneksi = mysqli_connect("localhost", "root", "", "sekolah");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal.";
    exit();
}

$nis = $_GET['id'];


$hapusKomposisikelas = "DELETE FROM komposisi_kelas WHERE siswa_nis = '$nis'";
if (!mysqli_query($koneksi, $hapusKomposisikelas)) {
    echo "Gagal menghapus siswa dari tabel komposisi_rombel.";
    exit();
}


$hapusKomposisiEskul = "DELETE FROM komposisi_eskul WHERE siswa_nis = '$nis'";
if (!mysqli_query($koneksi, $hapusKomposisiEskul)) {
    echo "Gagal menghapus siswa dari tabel komposisi_eskul.";
    exit();
}

// Hapus siswa dari tabel siswa
$hapusSiswa = "DELETE FROM siswa WHERE nis = '$nis'";
if (mysqli_query($koneksi, $hapusSiswa)) {
    echo "Data siswa dengan NIS " . $nis . " berhasil dihapus.";
    header("Location: siswa.php");
    exit();
} else {
    echo "Gagal menghapus data siswa.";
}

mysqli_close($koneksi);
?>
