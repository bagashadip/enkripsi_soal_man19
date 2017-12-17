<?php

include "../../system/koneksi.php";
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$telp = $_POST['telpon'];
$email = $_POST['email'];


if (isset($_POST['input'])) {
    $query = "INSERT INTO guru (nip, nm_guru, password, telp, email, level) VALUES ('$nip', '$nama', '$nip', '$telp', '$email', 'guru')";
    if (!empty($nip) && !empty($nama) && !empty($telp) && !empty($email)) {
        mysql_query($query);
        header("Location:../data_guru.php?message=1");
    } else {
        header("Location:../data_guru.php?message=0");
    }
} else if (isset($_POST['update'])) {
    $update = "UPDATE guru SET nip='$nip', nm_guru='$nama', telp='$telp', email='$email' WHERE nip='$nip'";
    if (!empty($nip) && !empty($nama) && !empty($telp) && !empty($email)) {
        mysql_query($update);
        header("Location:../data_guru.php?update=1&status=input");
    } else {
        header("Location:../data_guru.php?update=0&status=input");
    }
}



