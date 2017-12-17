<?php
    $id_soal = base64_decode($_GET['id_soal']);
    $query = "SELECT (SELECT mp.nm_mp FROM mp WHERE mp.id_mp=soal.id_mp) as mapel, (SELECT guru.nm_guru FROM guru WHERE guru.nip=soal.nip) as nm_guru, soal.kelas, soal.id_soal, soal.tgl_ujian, soal.jam, soal.file, soal.semester, soal.thn_ajar, soal.deskripsi, soal.jns_ujian, soal.tgl_upload FROM soal WHERE id_soal = '$id_soal'";
    $result = mysql_query($query);
    $data = mysql_fetch_array($result);
?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">

                <div class="well well-lg">
                    <h4>Detail Soal:</h4>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Guru</label>
                        <div class="col-sm-10">
                            <label>:</label>
                            <label><?php echo $data['nm_guru'];?></label>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Mata Pelajaran</label>
                        <div class="col-sm-10">
                            <label>:</label>
                            <label><?php echo $data['mapel'];?></label>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Id Soal</label>
                        <div class="col-sm-10">
                            <label>:</label>
                            <label><?php echo $data['id_soal'];?></label>
                        </div>
                    </div><br>
                     <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <label>:</label>
                            <label><?php echo $data['deskripsi'];?></label>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Kelas</label>
                        <div class="col-sm-10">
                            <label>:</label>
                            <label><?php echo $data['kelas'];?></label>
                        </div>
                    </div><br>
                     <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Jenis Ujian</label>
                        <div class="col-sm-10">
                            <label>:</label>
                            <label><?php echo $data['jns_ujian'];?></label>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Semester</label>
                        <div class="col-sm-10">
                            <label>:</label>
                            <label><?php echo $data['semester'];?></label>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Ujian</label>
                        <div class="col-sm-10">
                            <label>:</label>
                            <label><?php echo $data['tgl_ujian'];?></label>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Upload</label>
                        <div class="col-sm-10">
                            <label>:</label>
                            <label><?php echo $data['tgl_upload'];?></label>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Jam Ujian</label>
                        <div class="col-sm-10">
                            <label>:</label>
                            <label><?php echo $data['jam'];?></label>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Nama File</label>
                        <div class="col-sm-10">
                            <label>:</label>
                            <label><?php echo str_replace("../upload/", "", $data['file']);?></label>
                        </div>
                    </div><br><br>
                        <div class="form-group">
                            <!--<label for="inputEmail3" class="col-sm-2 control-label">Key</label>-->
                            <div class="col-sm-4">
                                <a href="data_soal.php" class="pull-right btn btn-warning">Kembali</a>
                            </div>
                        </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->