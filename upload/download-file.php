<?php
session_start();
ini_set('max_execution_time', -1);
ini_set('memory_limit', -1);
error_reporting(0);
//$dt = base64_decode($_GET['file']);
$file = substr($_GET['file'], 10);
if (isset($_POST['download'])) {
    include '../system/aes.php';
    $key = base64_encode($_POST['key']);

    $cipher_file = fopen($file, 'rb');
    $plain = "";

    $a = filesize($file);
    $banyak = $a / 16;

    $hash_password = md5($key);
    $aes = new AES(substr($hash_password, 0, 16));


    for ($bawah = 0; $bawah < $banyak; $bawah++) {
        $cipher = fread($cipher_file, 16);
        if ($bawah == ($banyak - 1)) { //apabila diposisi akhir
            $plain2 = $aes->decrypt($cipher);
            if ($plain2[15] > 0 && $plain2[15] < 16) {
                for ($cekbawah = 0; $cekbawah < $plain2[15]; $cekbawah++) {
                    $plain .= $plain2[$cekbawah];
                }
            } else {
                $plain .= $plain2;
            }
        } else {
            $plain .= $aes->decrypt($cipher);
        }
    }
}
include "../system/koneksi.php";
$id_soal = base64_decode($_GET['id_soal']);
$sql = "update soal set tgl_download = now(), status = 1 where id_soal = '" . $id_soal . "'";
$query = mysql_query($sql) or die(mysql_error());


//echo "<script>alert('Data berhasil di Download');document.location='../enkripsi.php'</script>";

header("Content-type: application/force-download");
header("Content-Disposition: attachment; filename=" . $file);


//header("refresh: 2; url=../enkripsi.php");
echo $plain;
?>
