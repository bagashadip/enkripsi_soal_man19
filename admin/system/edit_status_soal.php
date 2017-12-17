<?php
include "../../system/koneksi.php";
$id_soal = $_POST['id_soal'];
$status = $_POST['status'];

if($status == 'Enable'){
    $st = 0;
}else{
    $st = 1;
}

if(isset($_POST['update'])){
    $query = "UPDATE soal SET status = '$st', tgl_upload = tgl_upload WHERE id_soal = '$id_soal'";
    mysql_query($query);
    header("Location:../data_enkrip_dekrip.php?status=$st&id_soal=$id_soal");
}

if(isset($_POST['back']))
    header("Location:../data_enkrip_dekrip.php");

