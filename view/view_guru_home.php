<?php
    $nip = $_SESSION['nip'];
    $query = "SELECT COUNT(id_soal) as total FROM soal WHERE nip_pan='$nip' AND status = 0";
    $result = mysql_query($query);
    $data = mysql_fetch_array($result);
    if($data['total'] != 0)
        $msg = "Ada soal yang harus dienkrip. <a href='data_soal.php'>Klik disini</a>";
    else
        $msg = "";
    
?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Home
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Home
                            </li>
                            <p class="pull-right text-danger"><?php echo $msg;?></p>
                        </ol>
                    </div>
                </div>
				
				<div class="row">
					<div class="col-lg-12">
					<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-info-circle"></i><strong> Petunjuk Penggunaan Aplikasi </strong></h3>
                            </div>
                            <div class="panel-body">
                                <p align="center">Selamat datang di Aplikasi Enkripsi dan Dekripsi Soal Ujian pada MAN 19 . Aplikasi ini bertujuan untuk memudahkan para Guru yang mengajar Mata Pelajaran di sekolah agar dapat mengakses aplikasi ini dimanapun, dan kemudian dapat mengupload soal ujian selama jaringan terkoneksi dengan baik. Sehingga Pengawas Ujian dapat menjaga file soal ujian yang sudah masuk tanpa mengetahui soal yang sudah terenkripsi dengan aman.</p>
								<br />
								<p align="center"><strong>Semoga Aplikasi Keamanan ini bermanfaat dan dapat digunakan sebaik-baiknya.</P></strong>
                            </div>
                    </div>
				</div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->