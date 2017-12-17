<?php

session_start();
include './koneksi.php';
if (isset($_POST['login'])) {
    $user = mysql_real_escape_string($_POST['username']);
    $pass = $_POST['password'];

    if (empty($user) || empty($pass)) {
        header("location:../login_guru.php?error=0");
    } else {
        $query = "SELECT * FROM guru WHERE nip='$user' AND password='$pass'";
        $result = mysql_query($query);
        $data = mysql_fetch_array($result);
        if ($user == $data['nip'] && $pass == $data['password']) {
            if (mysql_num_rows($result) > 0) {
                $_SESSION['nip'] = $data['nip'];
                $_SESSION['password'] = $data['password'];
                $_SESSION['level'] = $data['level'];
                header("location:../index.php");
            }
        } else {
            header("location:../login_guru.php?error=1");
        }
    }
}

//session_start();
//
//$username = mysql_real_escape_string($_POST['username']);
//$password = $_POST['password'];
//
//$sql = "SELECT * FROM admin WHERE nip='$username' and password='$password'";
//$query = mysql_query($sql);
//$hasil = mysql_fetch_array($query);
//
//if (!empty($username) && !empty($password)) {
//    if (mysql_num_rows($query) > 0) {
//        $_SESSION['username'] = $hasil['nip'];
//        $_SESSION['password'] = $hasil['password'];
//        $_SESSION['level'] = $hasil['level'];
//        header("location:../admin_home.php");
//    }
//} else {
//    echo '<script>alert("Maaf username atau password tidak boleh kosong, Silahkan Login Kembali !!");document.location="index.php"</script>';
//}


