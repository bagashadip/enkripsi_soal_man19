<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Input Mata Pelajaran
                </h1>
                <?php
                error_reporting(0);
                $btnUpdate = "disabled";
                if (isset($_GET['message'])) {
                    if ($_GET['message'] == '1') {
                        $msg = "Input data Mapel berhasil";
                        $cls = "label-primary";
                    } else if ($_GET['message'] == '0') {
                        $msg = "Input data Mapel gagal";
                        $cls = "label-danger";
                    } else if ($_GET['message']) {
                        $msg = "Mata Pelajaran dengan Kode : " . $_GET['message'] . " berhasil dihapus";
                        $cls = "label-warning";
                    } else {
                        $msg = "";
                        $cls = "";
                    }
                } else {
                    $msg = "";
                }

                if (isset($_GET['status'])) {
                    if ($_GET['status'] == 'update') {
                        $btnInput = "disabled";
                        $btnUpdate = "enabled";
                        $txt_id_mp = "readonly";
                    } else if ($_GET['status'] == 'input') {
                        $btnInput = "enabled";
                        $btnUpdate = "disabled";
                        $txt_id_mp = "";
                    }
                }

                if (isset($_GET['update'])) {
                    if ($_GET['update'] == "1") {
                        $msg = "Data berhasil diubah";
                        $cls = "label-success";
                    } else if ($_GET['update'] == '0') {
                        $msg = "Data gagal diubah";
                        $cls = "label-danger";
                    }
                }
                ?>
                <p class="label <?php echo $cls; ?> center-block"><b><?php echo $msg; ?></b></p>

                <form class="form-horizontal" action="system/input_mapel_proses.php" method="post">
                    <?php
                    $query = "SELECT * FROM mp ORDER BY id_mp DESC";
                    $result = mysql_query($query);
                    $data = mysql_fetch_array($result);
                    $str_id_mp = substr($data['id_mp'], 2);
                    $val = $str_id_mp + 1;
                    if ($val < 10) {
                        $id_mp = "KP00" . $val;
                    } else if ($val < 100) {
                        $id_mp = "KP0" . $val;
                    } else if ($val < 1000) {
                        $id_mp = "KP" . $val;
                    }
                    if (isset($_GET['status'])) {
                        if ($_GET['status'] == 'update') {
                            $id_mp = $_GET['id_mp'];
                            $btnInput = "disabled";
                            $btnUpdate = "enabled";
                            $txt_id_mp = "readonly";
                        } else if ($_GET['status'] == 'input') {
                            $btnInput = "enabled";
                            $btnUpdate = "disabled";
                            $txt_id_mp = "";
                            $id_mp = $id_mp;
                        }
                    }
                    ?>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Kode Mata Pelajaran</label>
                        <div class="col-sm-2">
                            <input type="text" name="kd_mapel" class="form-control" id="inputEmail3" value="<?php echo $id_mp; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Nama Mata Pelajaran</label>
                        <div class="col-sm-5">
                            <input type="text" name="nm_mapel" class="form-control" id="inputPassword3" placeholder="Nama Mata Pelajaran" value="<?php echo $_GET['nm_mp']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="input" class="btn btn-primary" <?php echo $btnInput; ?>>Input</button>
                            <button type="submit" name="update" class="btn btn-info" <?php echo $btnUpdate; ?>>Update</button>
                            <button type="reset" name="batal" class="btn btn-warning">Batal</button>
                        </div>
                    </div>
                </form>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Data Mata Pelajaran
                    </li>
                </ol>
                <div class="row">
                    <div class="col-md-3 pull-right">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="srch-term" id="search">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                    </div><br><br>
                </div>
                <table class="table table-hover table-responsive table-bordered table-condensed table-striped" id="table_filter">
                    <thead>
                        <tr class="active">
                            <th>Kode Mapel</th>
                            <th>Nama Mapel</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM mp";
                        $result = mysql_query($sql);
                        while ($data = mysql_fetch_array($result)) {
                            ?>
                            <tr>
                                <td><?php echo $data['id_mp']; ?></td>
                                <td><?php echo $data['nm_mp']; ?></td>
                                <td><a href="data_mapel.php?id_mp=<?php echo $data['id_mp']; ?>&nm_mp=<?php echo $data['nm_mp']; ?>&status=update">Edit</a> | <a href="system/delete_mapel_proses.php?id_mp=<?php echo $data['id_mp']; ?>" onclick="return confirmDelete()">Delete</a></td>
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