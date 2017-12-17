<?php

session_start();
include './koneksi.php';

if (isset($_POST['update'])) {
    $nip = $_SESSION['nip'];
    $old_pass = $_POST['pass_lama'];
    $new_pass = $_POST['pass_baru'];
    $new_pass2 = $_POST['pass_baru2'];

    $query = "SELECT * FROM guru WHERE nip='$nip'";
    $result = mysql_query($query);
    $data = mysql_fetch_array($result);

    if (!empty($old_pass) && !empty($new_pass) && !empty($new_pass2)) {
        if ($old_pass != $data['password']) {
            header("location:../ganti_password.php?error=1");
        } else if ($new_pass != $new_pass2) {
            header("location:../ganti_password.php?error=2");
        } else{
            $q = "UPDATE guru SET password = '$new_pass' WHERE nip = '$nip'";
            mysql_query($q);
            header("location:../ganti_password.php?message=success");
        }
    }else{
        header("location:../ganti_password.php?message=error");
    }
}
