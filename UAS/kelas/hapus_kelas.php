<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $koneksi = mysqli_connect("localhost", "root", "", "sekolah");

    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $id_kelas = $_GET["id"];

    $delete_query = "DELETE FROM kelas WHERE id_kelas = '$id_kelas'";

    if (mysqli_query($koneksi, $delete_query)) {
        echo "Data kelas berhasil dihapus.";
        header("Location: kelas.php");
        exit();
    } else {
        echo "Error: " . $delete_query . "<br>" . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
} else {
    header("Location: kelas.php");
    exit();
}
?>
