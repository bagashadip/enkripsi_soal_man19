<?php

session_start();
include '../system/koneksi.php';
include '../system/aes.php';

if (isset($_POST['encrypt'])) {
    $id_soal = $_POST['id_soal'];

    $str_id_mp = explode(" ", $_POST['id_mp']);
    $id_mp = $str_id_mp[0];

    $str_nip_pan = explode(" ", $_POST['nip_pan']);
    $nip_pan = $str_nip_pan[0];

    $deskripsi = $_POST['deskripsi'];
    $tgl_ujian = $_POST['tgl_ujian'];
    $jam_ujian = $_POST['jam_ujian'];
    $jenis_ujian = $_POST['jenis_ujian'];
    $semester = $_POST['semester'];
    $thn_ajaran = $_POST['thn_ajaran'];
    $kelas = $_POST['kelas'];
    $jam = $_POST['jam_ujian'];
    $key = base64_encode($_POST['key']);

    $file_tmpname = $_FILES['file']['tmp_name'];
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $info = pathinfo($file_name);

    $file_source = fopen($file_tmpname, 'rb');
    $file_output = fopen('../upload/' . $file_name, 'wb');

    $a = filesize($file_tmpname);
    $mod = $a % 16;
    if ($mod == 0) {
        $banyak = $a / 16;
    } else {
        $banyak = ($a - $mod) / 16;
        $banyak = $banyak + 1;
    }

    if (is_uploaded_file($file_tmpname)) {

        ini_set('max_execution_time', -1);
        ini_set('memory_limit', -1);

        $hash_password = md5($key);
        $aes = new AES(substr($hash_password, 0, 16));

        if ($info['extension'] == 'doc' || $info['extension'] == 'docx' || $info['extension'] == 'xls' || $info['extension'] == 'xlsx' || $info['extension'] == 'excel' || $info['extension'] == 'pdf') {
            echo 'tipe file word, excel, dan pdf';
        } else {
            exit('maaf hanya bisa upload file word, excel dan pdf saja');
        }


        for ($bawah = 0; $bawah < $banyak; $bawah++) { // 34 bit
            $data = fread($file_source, 16);
            if ($mod > 0 && $bawah == ($banyak - 1)) {
                $data[15] = $mod; // 2
                $cipher = $aes->encrypt($data);
                fwrite($file_output, $cipher);
            } else {
                $cipher = $aes->encrypt($data);
                fwrite($file_output, $cipher);
            }
        }

        //$sql = "insert into soal values('','" . $nama_matkul . "','" . $_SESSION['username'] . "','$deskripsi','" . $tgl_ujian . "','" . $jam . "','" . $jenis_ujian . "','" . $semester . "','" . $thn_ajar . "','" . $nama_spv . "','" . $key . "',now(),'upload/" . $file_name . "','')";
        $sql = "insert into soal values('$id_soal', '$id_mp', '" . $_SESSION['nip'] . "', '$deskripsi', '$tgl_ujian', '$jam', '$jenis_ujian', '$semester', '$thn_ajaran', '$kelas', '$nip_pan', '$key', now(), '../upload/" . $file_name . "', '', 0)";
        $query = mysql_query($sql) or die(mysql_error());
        if ($query) {
            header("location:../enkripsi.php?message=1");
        } else {
            echo "Upload Gagal !";
        }
    } else {
        echo "Possible file upload attack : ";
        echo "filename " . $_FILES['file']['tmp_name'] . ".";
        echo "filename " . $_FILES['file']['error'] . ".";
    }
}