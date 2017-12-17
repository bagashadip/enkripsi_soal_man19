
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Enkripsi Soal
                </h1>
                <?php
                error_reporting(0);
                $btnUpdate = "disabled";
                if (isset($_GET['message'])) {
                    if ($_GET['message'] == '1') {
                        $msg = "Encrypt soal berhasil.";
                        $cls = "label-primary";
                    } else if ($_GET['message'] == '0') {
                        $msg = "Encrypt soal gagal!";
                        $cls = "label-danger";
                    } else {
                        $msg = "";
                        $cls = "";
                    }
                } else {
                    $msg = "";
                }
                ?>
                <p class="label <?php echo $cls; ?> center-block"><b><?php echo $msg; ?></b></p>

                <form class="form-horizontal" method="post" action="system/encrypt_proses.php" enctype="multipart/form-data">
                    <?php
                    $query = "SELECT * FROM soal ORDER BY id_soal DESC";
                    $result = mysql_query($query);
                    $data = mysql_fetch_array($result);
                    $str_id_mp = substr($data['id_soal'], 2);
                    $val = $str_id_mp + 1;
                    if ($val < 10) {
                        $id_soal = "SE0000" . $val;
                    } else if ($val < 100) {
                        $id_soal = "SE000" . $val;
                    } else if ($val < 1000) {
                        $id_soal = "SE00" . $val;
                    } else if ($val < 100000) {
                        $id_soal = "SE0" . $val;
                    } else if ($val < 1000000) {
                        $id_soal = "SE" . $val;
                    }
                    ?>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">ID Soal</label>
                        <div class="col-sm-4">
                            <input type="text" name="id_soal" class="form-control" id="inputEmail3" placeholder="NIP" value="<?php echo $id_soal; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Mata Pelajaran</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="id_mp" required>
                                <option>---Pilih Mapel---</option>
                                <?php
                                $q = "SELECT * FROM mp ORDER BY nm_mp ASC";
                                $result = mysql_query($q);
                                while ($mp = mysql_fetch_array($result)) {
                                    ?>
                                    <option><?php echo $mp['id_mp']; ?> - <?php echo $mp['nm_mp']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Pengawas</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="nip_pan" required>
                                <option>---Pilih Pengawas---</option>
                                <?php
                                $nip = $_SESSION['nip'];
                                $q = "SELECT * FROM guru WHERE nip <> '$nip' ORDER BY nip ASC";
                                $result = mysql_query($q);
                                while ($guru = mysql_fetch_array($result)) {
                                    ?>
                                    <option><?php echo $guru['nip']; ?> - <?php echo $guru['nm_guru']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Deskripsi</label>
                        <div class="col-sm-4">
                            <textarea class="form-control" name="deskripsi"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Tgl Ujian</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="tgl_ujian" name="tgl_ujian" placeholder="Tanggal ujian" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Jam Ujian</label>
                        <div class="col-sm-3 input-append" id="datetimepicker3">
                            <select class="form-control" name="jam_ujian">
                                <?php
                                    $i=7;
                                    $a="";
                                    while($i < 15){
                                        if($i < 10)
                                            $a = "0";
                                        else
                                            $a = "";
                                        echo "<option>".$a.$i.":00<option>";
                                        echo "<option>".$a.$i.":30<option>";
                                        $i++;
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Jenis Ujian</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="jenis_ujian" required>
                                <option>--- Jenis Ujian ---</option>
                                <option>Ujian Harian</option>
                                <option>UTS</option>
                                <option>UAS</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Semester</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="semester" required>
                                <option>--- Semester ---</option>
                                <option>Ganjil</option>
                                <option>Genap</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Tahun Ajaran</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="thn_ajaran" required>

                                <option><?php echo date("Y") . "/";
                                echo date("Y") + 1; ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Kelas</label>
                        <div class="col-sm-2">
                            <select class="form-control" name="kelas">
                                <option>--- Kelas ---</option>
                                <option>12</option>
                                <option>11</option>
                                <option>10</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Key</label>
                        <div class="col-sm-2">
                            <input type="password" class="form-control" name="key" maxlength ="16">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">File</label>
                        <div class="col-sm-2">
                            <input type="file" name="file" id="file" title="upload file anda disini" required="required">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" name="encrypt">Encrypt</button>
                            <button type="reset" class="btn btn-warning" name="batal">Batal</button>
                        </div>
                    </div>
                </form>


                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Data Enkripsi
                    </li>
                </ol>
                <table class="table table-hover table-responsive">
                    <tr class="active">
                        <th>ID Soal</th>
                        <th>Nama Soal</th>
                        <th>Pengawas</th>
                        <th>Kelas</th>
                        <th>Tgl Ujian</th>
                        <th>Semester</th>
                        <th>Thn Ajar</th>
                        <th>Tgl Encrypt</th>
                        <th>Password</th>
                        <th>Pilihan</th>
                    </tr>
                    <?php
                    $nip = $_SESSION['nip'];
                    $sql = "SELECT soal.id_soal, (SELECT mp.nm_mp FROM mp WHERE mp.id_mp=soal.id_mp) as mapel, (SELECT guru.nm_guru FROM guru WHERE guru.nip=soal.nip_pan) as pengawas, soal.kelas, soal.tgl_ujian, soal.semester, soal.thn_ajar, soal.tgl_upload, soal.key FROM soal WHERE soal.nip = '$nip' ORDER BY soal.id_soal ASC";
                    $result = mysql_query($sql);
                    while ($data = mysql_fetch_array($result)) {
                        ?>

                        <tr>
                            <td><?php echo $data['id_soal']; ?></td>
                            <td><?php echo $data['mapel']; ?></td>
                            <td><?php echo $data['pengawas']; ?></td>
                            <td><?php echo $data['kelas']; ?></td>
                            <td><?php echo $data['tgl_ujian']; ?></td>
                            <td><?php echo $data['semester']; ?></td>
                            <td><?php echo $data['thn_ajar']; ?></td>
                            <td><?php echo $data['tgl_upload']; ?></td>
                            <td><?php echo base64_decode($data['key']); ?></td>
                            <td>
                                <a class='btn btn-danger' href='system/proses_hapus_soal.php?id_soal=<?php echo base64_encode($data['id_soal']);?>' onclick="return confirmDelete()">Hapus
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <script language="JavaScript" type="text/javascript">
                    function confirmDelete() {
                        if (confirm("Konfirmasi penghapusan data")) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                </script>


            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->