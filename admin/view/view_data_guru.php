<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Input Data Guru
                </h1>
                <?php
                error_reporting(0);
                $btnUpdate = "disabled";
                if (isset($_GET['message'])) {
                    if ($_GET['message'] == '1') {
                        $msg = "Input data guru berhasil";
                        $cls = "label-primary";
                    } else if ($_GET['message'] == '0') {
                        $msg = "Input data guru gagal";
                        $cls = "label-danger";
                    } else if ($_GET['message']) {
                        $msg = "Guru dengan NIP : " . $_GET['message'] . " berhasil dihapus";
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
                        $txt_nip = "readonly";
                    } else if ($_GET['status'] == 'input') {
                        $btnInput = "enabled";
                        $btnUpdate = "disabled";
                        $txt_nip = "";
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
                <form class="form-horizontal" method="post" action="system/input_guru_proses.php">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">NIP</label>
                        <div class="col-sm-4">
                            <input type="text" name="nip" class="form-control" id="inputEmail3" placeholder="NIP" value="<?php echo $_GET['nip']; ?>" <?php echo $txt_nip; ?>>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-5">
                            <input type="text" name="nama" class="form-control" id="inputPassword3" placeholder="Nama Lengkap" value="<?php echo $_GET['nama']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Telpon</label>
                        <div class="col-sm-3">
                            <input type="text" name="telpon" class="form-control" id="inputPassword3" placeholder="Telpon" value="<?php echo $_GET['telp']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-4">
                            <input type="email" name="email" class="form-control" id="inputPassword3" placeholder="guru@guru.com" value="<?php echo $_GET['email']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" name="input" <?php echo $btnInput ?>>Input</button>
                            <button type="submit" class="btn btn-info" name="update" <?php echo $btnUpdate ?>>Update</button>
                            <button type="reset" class="btn btn-warning" name="batal">Batal</button>
                        </div>
                    </div>
                </form>


                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Data Guru
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
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Telpon</th>
                            <th>Email</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM guru";
                        $result = mysql_query($sql);
                        while ($data = mysql_fetch_array($result)) {
                            ?>

                            <tr>
                                <td><?php echo $data['nip']; ?></td>
                                <td><?php echo $data['nm_guru']; ?></td>
                                <td><?php echo $data['telp']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><a href="data_guru.php?nip=<?php echo $data['nip']; ?>&nama=<?php echo $data['nm_guru']; ?>&telp=<?php echo $data['telp']; ?>&email=<?php echo $data['email']; ?>&status=update">Edit</a> | <a href="system/delete_guru_proses.php?nip=<?php echo $data['nip']; ?>" onclick="return confirmDelete()">Delete</a></td>
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