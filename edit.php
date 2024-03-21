<?php

include("./config.php");

// cek apa tombol daftar udah di klik blom
if (isset($_POST['edit_data'])) {
    // ambil data dari form
    $id_pasien = $_POST['edit_id_pasien'];
    $nama_pasien = $_POST['edit_nama_pasien'];
    $jenis_kelamin_pasien = $_POST['edit_jenis_kelamin_pasien'];
    $tgl_lahir_pasien = $_POST['edit_tgl_lahir_pasien'];
    $alamat_pasien = $_POST['edit_alamat_pasien'];

    $sql = "UPDATE tbl_pasien SET nama_pasien = '$nama_pasien', jenis_kelamin_pasien = '$jenis_kelamin_pasien', tgl_lahir_pasien = '$tgl_lahir_pasien', alamat_pasien = '$alamat_pasien' WHERE id_pasien = $id_pasien";
    $query = mysqli_query($dbpasien, $sql);

    if ($query) {
        header('location: index.php?status=edit_sukses');
    } else {
        header('location: index.php?status=edit_gagal');
    }
} else {
    die("Akses ditolak");
}
?>
