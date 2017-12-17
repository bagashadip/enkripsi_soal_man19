<?php

include "../../system/koneksi.php";
$kd_mp = $_POST['kd_mapel'];
$nm_mp = $_POST['nm_mapel'];


if (isset($_POST['input'])) {
    $query = "INSERT INTO mp (id_mp, nm_mp) VALUES ('$kd_mp', '$nm_mp')";
    if(!empty($kd_mp) && !empty($nm_mp)){
        mysql_query($query);
        header("Location:../data_mapel.php?message=1");
    }else{
        header("Location:../data_mapel.php?message=0");
    }
} else if(isset($_POST['update'])){
    $update = "UPDATE mp SET nm_mp = '$nm_mp' WHERE id_mp = '$kd_mp'";
    if(!empty($nm_mp)){
        mysql_query($update);
        header("Location:../data_mapel.php?update=1&status=input");
    }else{
        header("Location:../data_mapel.php?update=0&status=input");
    }
}



