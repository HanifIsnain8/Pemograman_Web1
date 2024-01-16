<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $koneksi = mysqli_connect("localhost", "root", "", "sekolah");

    $id_eskul = $_GET["id"];
    $delete_query = "DELETE FROM eskul WHERE id_eskul = $id_eskul";

    if (mysqli_query($koneksi, $delete_query)) {
        echo "Eskul berhasil dihapus.";
    } else {
        echo "Error: " . $delete_query . "<br>" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
    header("Location: eskul.php");
    exit;
}
?>
