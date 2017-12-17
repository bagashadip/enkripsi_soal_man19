<?php

session_start();
include "koneksi.php";

$username = mysql_real_escape_string($_POST['username']);
$password = $_POST['password'];

$sql = "SELECT * FROM guru WHERE nip='$username' and password='$password'";
$query = mysql_query($sql);
$hasil = mysql_fetch_array($query);

if (!empty($username) && !empty($password)) {
    if (mysql_num_rows($query) > 0) {
        $_SESSION['username'] = $hasil['nip'];
        $_SESSION['password'] = $hasil['password'];
        $_SESSION['level'] = $hasil['level'];
        header("location:home_guru.php");
    } else {
        $sql = "SELECT * FROM panitia WHERE nip_pan='$username' and password='$password'";
        $query = mysql_query($sql);
        $hasil = mysql_fetch_array($query);
        if (mysql_num_rows($query) > 0) {
            if ($hasil['level'] == '1') {
                $_SESSION['username'] = $hasil['nip_pan'];
                $_SESSION['password'] = $hasil['password'];
                $_SESSION['level'] = $hasil['level'];
                header("location:home_admin.php");
            } else if ($hasil['level'] == '2') {
                $_SESSION['username'] = $hasil['nip_pan'];
                $_SESSION['password'] = $hasil['password'];
                $_SESSION['level'] = $hasil['level'];
                header("location:home_panitia.php");
            }
        } else {
            echo '<script>alert("Maaf Username atau Password Anda Salah, Silahkan Login Kembali !!");document.location="index.php"</script>';
        }
    }
} else {
    echo '<script>alert("Maaf username atau password tidak boleh kosong, Silahkan Login Kembali !!");document.location="index.php"</script>';
}
?>
