<?php

session_start();
include "../../system/koneksi.php";

$username = mysql_real_escape_string($_POST['username']);
$password = $_POST['password'];

$sql = "SELECT * FROM admin WHERE nip='$username' and password='$password'";
$query = mysql_query($sql);
$hasil = mysql_fetch_array($query);

if (!empty($username) && !empty($password)) {
    if (mysql_num_rows($query) > 0) {
        $_SESSION['username'] = $hasil['nip'];
        $_SESSION['password'] = $hasil['password'];
        $_SESSION['level'] = $hasil['level'];
        header("location:../admin_home.php");
    }
} else {
    echo '<script>alert("Maaf username atau password tidak boleh kosong, Silahkan Login Kembali !!");document.location="index.php"</script>';
}
?>
