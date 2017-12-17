<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Status Soal
                </h1>
                <form class="form-horizontal" method="post" action="system/edit_status_soal.php">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">ID Soal</label>
                        <div class="col-sm-4">
                            <input type="text" name="id_soal" class="form-control" id="inputEmail3" value="<?php echo $_GET['id_soal'];?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Kode Soal</label>
                        <div class="col-sm-4">
                            <input type="text" name="id_mp" class="form-control" id="inputEmail3" value="<?php echo $_GET['id_mp'];?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Guru</label>
                        <div class="col-sm-5">
                            <input type="text" name="guru" class="form-control" id="inputPassword3" value="<?php echo $_GET['guru'];?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Pengawas</label>
                        <div class="col-sm-3">
                            <input type="text" name="pengawas" class="form-control" id="inputPassword3" value="<?php echo $_GET['pengawas'];?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Status Enkripsi</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="status">
                                <?php
                                    if(isset($_GET['status'])){
                                        if($_GET['status'] == 1){
                                            $stat1 = "Disable";
                                            $stat2 = "Enable";
                                        }else{
                                            $stat1 = "Enable";
                                            $stat2 = "Disable";
                                        }
                                    }
                                ?>
                                <option><?php echo $stat1;?></option>
                                <option><?php echo $stat2;?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-info" name="update">Update</button>
                            <button type="submit" class="btn btn-warning" name="back">Kembali</button>
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

