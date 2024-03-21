<?php

include("./config.php");

if (isset($_POST['tambah'])) {
  $id_pasien = $_POST['id_pasien'];
  $nama_pasien = $_POST['nama_pasien'];
  $jenis_kelamin_pasien = $_POST['jenis_kelamin_pasien'];
  $tgl_lahir_pasien = $_POST['tgl_lahir_pasien'];
  $alamat_pasien = $_POST['alamat_pasien'];

  $sql = "INSERT INTO tbl_pasien (nama_pasien, jenis_kelamin_pasien, tgl_lahir_pasien, alamat_pasien)
  VALUES('$nama_pasien', '$jenis_kelamin_pasien', '$tgl_lahir_pasien', '$alamat_pasien')";
  $db = mysqli_connect('localhost', 'root', '', 'dbpasien'); 
  $query = mysqli_query($db, $sql);

  if ($query)
    header('location: index.php?status=sukses');
  else
    header('location: index.php?status=gagal');
} else {
  die("Akses ditolak");
}
?>