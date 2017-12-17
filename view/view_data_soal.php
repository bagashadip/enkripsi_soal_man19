
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Dekripsi Soal
                </h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Data Dekripsi
                    </li>
                </ol>
                <table class="table table-hover table-responsive">
                    <tr class="active">
                        <th>ID Soal</th>
                        <th>Nama Soal</th>
                        <th>Guru</th>
                        <th>Kelas</th>
                        <th>Tgl Ujian</th>
                        <th>Semester</th>
                        <th>Thn Ajar</th>
                        <th>Key</th>
                        <th>Input Key</th>
                        <th colspan="2" class="text-center">Pilihan</th>
                    </tr>
                    <?php
                    $nip = $_SESSION['nip'];
                    $sql = "SELECT soal.id_soal, (SELECT mp.nm_mp FROM mp WHERE mp.id_mp=soal.id_mp) as mapel, (SELECT guru.nm_guru FROM guru WHERE guru.nip=soal.nip) as guru, soal.kelas, soal.tgl_ujian, soal.file, soal.semester, soal.thn_ajar, soal.tgl_upload, soal.key FROM soal WHERE soal.status=0 AND soal.nip_pan = '$nip'  ORDER BY soal.id_soal ASC";
                    $result = mysql_query($sql);
                    while ($data = mysql_fetch_array($result)) {
                        ?>
                    <form action="upload/download-file.php?id_soal=<?php echo base64_encode($data['id_soal']); ?>&file=<?php echo $data['file']; ?>" method="post" target="_blank">
                            <tr>
                                <td><?php echo $data['id_soal']; ?></td>
                                <td><?php echo $data['mapel']; ?></td>
                                <td><?php echo $data['guru']; ?></td>
                                <td><?php echo $data['kelas']; ?></td>
                                <td><?php echo $data['tgl_ujian']; ?></td>
                                <td><?php echo $data['semester']; ?></td>
                                <td><?php echo $data['thn_ajar']; ?></td>
                                <td><?php echo base64_decode($data['key']); ?></td>
                                <td>
                                    <div class="col-md-3">
                                        <input type="password" name="key" required>
                                    </div>
                                </td>
                                <td>
                                    <button type="submit" name="download" class="btn btn-info glyphicon glyphicon-download-alt icon-white a_button pull-right" onclick="myFunction()"> Unduh</button>
                                    
                                </td>
                                <td><a class='btn btn-danger' href='detail_soal.php?id_soal=<?php echo base64_encode($data['id_soal']);?>'>Detail Soal
                                </a></td>
                            </tr>
                        </form>
                        <?php
                    }
                    ?>
                </table>
                <script>
                    function myFunction() {
                        setInterval(function(){window.location.reload();},1000);
                    };
                </script>

            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->