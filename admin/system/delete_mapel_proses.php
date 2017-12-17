<?php
include "../../system/koneksi.php";
$id_mp = $_GET['id_mp'];
$query = "DELETE FROM mp WHERE id_mp = '$id_mp'";
mysql_query($query);
header("Location:../data_mapel.php?message=$id_mp");

