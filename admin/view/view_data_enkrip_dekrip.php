<?php
if (isset($_POST['enkrip'])) {
    $sql = "SELECT soal.id_soal, soal.id_mp, (SELECT mp.nm_mp FROM mp WHERE mp.id_mp=soal.id_mp) as mapel, (SELECT guru.nm_guru FROM guru WHERE guru.nip=soal.nip) as nm_guru, (SELECT guru.nm_guru FROM guru WHERE guru.nip=soal.nip_pan) as nm_pengawas, soal.tgl_ujian, soal.thn_ajar, date(tgl_upload) as tgl_enkrip, soal.status FROM soal, guru WHERE soal.status = 0 AND soal.nip = guru.nip ORDER BY soal.id_soal DESC";
} else if (isset($_POST['dekrip'])) {
    $sql = "SELECT soal.id_soal, soal.id_mp, (SELECT mp.nm_mp FROM mp WHERE mp.id_mp=soal.id_mp) as mapel, soal.id_mp, (SELECT guru.nm_guru FROM guru WHERE guru.nip=soal.nip) as nm_guru, (SELECT guru.nm_guru FROM guru WHERE guru.nip=soal.nip_pan) as nm_pengawas, soal.tgl_ujian, soal.thn_ajar, date(tgl_upload) as tgl_enkrip, soal.status FROM soal, guru WHERE soal.status = 1 AND soal.nip = guru.nip ORDER BY soal.id_soal DESC";
} else {
    $sql = "SELECT soal.id_soal, soal.id_mp, (SELECT mp.nm_mp FROM mp WHERE mp.id_mp=soal.id_mp) as mapel, soal.id_mp, (SELECT guru.nm_guru FROM guru WHERE guru.nip=soal.nip) as nm_guru, (SELECT guru.nm_guru FROM guru WHERE guru.nip=soal.nip_pan) as nm_pengawas, soal.tgl_ujian, soal.thn_ajar, date(tgl_upload) as tgl_enkrip, soal.status FROM soal, guru WHERE soal.nip = guru.nip ORDER BY soal.id_soal DESC";
}
?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Data Enkripsi & Dekripsi
                </h1>
                <?php
                if (isset($_GET['status'])) {
                    if ($_GET['status'] == 1) {
                        $msg = "Soal dengan kode '" . $_GET['id_soal'] . "' telah di non-aktifkan";
                        $cls = "label-warning";
                    } else {
                        $msg = "Soal dengan kode '" . $_GET['id_soal'] . "' telah diaktifkan";
                        $cls = "label-primary";
                    }
                } else {
                    $msg = "";
                }
                ?>
                <p class="label <?php echo $cls; ?> center-block"><b><?php echo $msg; ?></b></p>
                <form action="data_enkrip_dekrip.php" method="post">
                    <h4>Sort By: </h4>
                    <button type="submit" class="btn btn-danger btn-sm" name="enkrip">Data Enkripsi</button>
                    <button type="submit" class="btn btn-warning btn-sm" name="dekrip">Data Dekripsi</button><br><br>
                    <label class="alert alert-info center-block">
                        
                        <div class="row">
                            <div class="col-md-3">
                                <h4>Data Enkripsi & Dekripsi</h4>
                            </div>
                            <div class="col-md-3 pull-right">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="srch-term" id="search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                    </div>
                                </div>
                            </div><br><br>
                        </div>
                    </label>
                </form>

                <table class="table table-hover table-responsive table-bordered table-condensed table-striped" id="table_filter">
                    <thead>
                        <tr class="active">
                            <th>ID Soal</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru</th>
                            <th>Pengawas</th>
                            <th>Tgl Ujian</th>
                            <th>Tahun Ajaran</th>
                            <th>Tgl Enkrip</th>
                            <th>Status</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = mysql_query($sql);
                        while ($data = mysql_fetch_array($result)) {
                            if ($data['status'] == 0)
                                $status = "Belum di-dekrip";
                            else
                                $status = "Sudah di-dekrip";
                            ?>

                            <tr>
                                <td><?php echo $data['id_soal']; ?></td>
                                <td><?php echo $data['mapel']; ?></td>
                                <td><?php echo $data['nm_guru']; ?></td>
                                <td><?php echo $data['nm_pengawas']; ?></td>
                                <td><?php echo $data['tgl_ujian']; ?></td>
                                <td><?php echo $data['thn_ajar']; ?></td>
                                <td><?php echo $data['tgl_enkrip']; ?></td>
                                <td><?php echo $status ?></td>
                                <td><a href="status_soal.php?id_soal=<?php echo $data['id_soal']; ?>&id_mp=<?php echo $data['id_mp']; ?>&guru=<?php echo $data['nm_guru']; ?>&pengawas=<?php echo $data['nm_pengawas']; ?>&status=<?php echo $data['status']; ?>">Setting</a></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <script>
                    var $rows = $('#table_filter tbody tr');
                    $('#search').keyup(function () {

                        var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
                                reg = RegExp(val, 'i'),
                                text;

                        $rows.show().filter(function () {
                            text = $(this).text().replace(/\s+/g, ' ');
                            return !reg.test(text);
                        }).hide();
                    });
                </script>
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