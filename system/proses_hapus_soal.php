<?php
session_start();
include './koneksi.php';
$id_soal = base64_decode($_GET['id_soal']);

$query = "DELETE FROM soal WHERE id_soal = '$id_soal'"; 
mysql_query($query);
header("location:../enkripsi.php");
