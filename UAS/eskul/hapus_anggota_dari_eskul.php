<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $koneksi = mysqli_connect("localhost", "root", "", "sekolah");



    $nis = $_GET["id"];

    $delete_query = "DELETE FROM komposisi_eskul WHERE siswa_nis = '$nis'";

    if (mysqli_query($koneksi, $delete_query)) {
        echo "Data kelas berhasil dihapus.";
        header("Location: eskul.php");
        exit();
    } else {
        echo "Error: " . $delete_query . "<br>" . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}
?>
