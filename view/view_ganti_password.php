<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Ganti Password Guru
                </h1>
                <?php
                    if(isset($_GET['error'])){
                        if($_GET['error'] == '1'){
                            $alert = "Password lama salah!";
                            $cls = "label-danger";
                        }else if($_GET['error'] == '2'){
                            $alert = "Konfirmasi password tidak sesuai.";
                            $cls = "label-danger";
                        }
                    }
                    
                    if(isset($_GET['message'])){
                        if($_GET['message'] == 'success'){
                            $alert = "Perubahan password berhasil.";
                            $cls = "label-success";
                        }else if($_GET['message'] == 'error'){
                            $alert = "Data password tidak boleh kosong.";
                            $cls = "label-warning";
                        }
                    }    
                        
                ?>
                <p class="label <?php echo $cls; ?> center-block"><b><?php echo $alert; ?></b></p>

                <form class="form-horizontal" action="system/ganti_password_proses.php" method="post">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Password Lama</label>
                        <div class="col-sm-3">
                            <input type="password" name="pass_lama" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password Baru</label>
                        <div class="col-sm-3">
                            <input type="password" name="pass_baru" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Konfrimasi Password Baru</label>
                        <div class="col-sm-3">
                            <input type="password" name="pass_baru2" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="update" class="btn btn-info">Ganti Password</button>
                            <button type="reset" name="batal" class="btn btn-warning">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->