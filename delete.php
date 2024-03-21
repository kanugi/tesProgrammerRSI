<?php
include("./config.php");

if (isset($_POST['delete_data'])) {
    // ambil id dari query string
    $id = $_POST['delete_id'];

    // query hapus
    $sql = "DELETE FROM tbl_pasien WHERE id = '$id_pasien'";
    $query = mysqli_query($dbpasien, $sql);

    // apa query berhasil dihapus?
    if ($query) {
        header('Location: ./index.php?hapus=sukses');
    } else
        die('Location: ./index.php?hapus=gagal');
} else
    die("Akses ditolak");

?>