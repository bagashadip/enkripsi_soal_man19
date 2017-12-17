<?php
include "../../system/koneksi.php";
$nip = $_GET['nip'];
$query = "DELETE FROM guru WHERE nip = '$nip'";
mysql_query($query);
header("Location:../data_guru.php?message=$nip");

