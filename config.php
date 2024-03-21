<?php

$server = '127.0.0.1';
$user = 'root';
$pass = '';
$db = 'dbpasien';

$db = mysqli_connect($server, $user, $pass, $db);

if (!$db)
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
?>